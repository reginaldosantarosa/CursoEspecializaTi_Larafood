<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    protected $repository;

    public function __construct(User $user)
    {
        $this->repository = $user;
        //$this->middleware(['can:usuarios']);
    }

    public function index()
    {
        $users = $this->repository->latest()->empresaUsuario()->paginate();
        return view('admin.paginas.usuarios.index', compact('users'));
    }


    public function create()
    {
        return view('admin.paginas.usuarios.create');
    }


    public function store(StoreUpdateUser $request)
    {
        $data = $request->all();
        $data['empresa_id'] = auth()->user()->empresa_id;
        $data['password'] = bcrypt($data['password']); // encrypt password

        $this->repository->create($data);

        return redirect()->route('usuarios.index');
    }


    public function show($id)
    {
        if (!$user = $this->repository->empresaUsuario()->find($id)) {
            return redirect()->back();
        }

        return view('admin.paginas.usuarios.show', compact('user'));
    }

    public function edit($id)
    {    //aqui usou o escopoLocal do model user
        if (!$user = $this->repository->empresaUsuario()->find($id)) {
            return redirect()->back();
        }
        return view('admin.paginas.usuarios.edit', compact('user'));
    }


    public function update(StoreUpdateUser $request, $id)
    {
        if (!$user = $this->repository->empresaUsuario()->find($id)) {
            return redirect()->back();
        }

        $data = $request->only(['name', 'email']);

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('usuarios.index');
    }


    public function destroy($id)
    {
        if (!$user = $this->repository->empresaUsuario()->find($id)) {
            return redirect()->back();
        }

        $user->delete();

        return redirect()->route('usuarios.index');
    }


    public function search(Request $request)
    {

        $filters = $request->only('filter');
        $users = $this->repository
            ->where(function($query) use ($request) {
                if ($request->filter) {
                    $query->orWhere('name', 'LIKE', "%{$request->filter}%");
                    $query->orWhere('email', $request->filter);
                }
            })
            ->latest()
            ->empresaUsuario()
            ->paginate();

        return view('admin.paginas.usuarios.index', compact('users', 'filters'));
    }
}

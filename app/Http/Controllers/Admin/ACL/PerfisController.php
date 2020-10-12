<?php

namespace App\Http\Controllers\Admin\ACL;

//use App\Http\Requests\StoreUpdatePerfil;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePerfil;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfisController extends Controller
{
    protected $repository;

    public function __construct(Perfil $perfil)
    {
        $this->repository = $perfil;
      //  $this->middleware(['can:perfis']);
    }

    public function index()
    {
        $perfis = $this->repository->paginate();
        return view('admin.paginas.perfis.index', compact('perfis'));
    }


    public function create()
    {
        return view('admin.paginas.perfis.create');
    }


    public function store(StoreUpdatePerfil $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('perfis.index');
    }


    public function show($id)
    {
        if (!$perfil = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.paginas.perfis.show', compact('perfil'));
    }


    public function edit($id)
    {
        if (!$perfil = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.paginas.perfis.edit', compact('perfil'));
    }


    public function update(StoreUpdatePerfil $request, $id)
    {
        if (!$perfil = $this->repository->find($id)) {
            return redirect()->back();
        }

        $perfil->update($request->all());

        return redirect()->route('perfis.index');
    }


    public function destroy($id)
    {
        if (!$perfil = $this->repository->find($id)) {
            return redirect()->back();
        }

        $perfil->delete();

        return redirect()->route('perfis.index');
    }


    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $perfis = $this->repository
            ->where(function($query) use ($request) {
                if ($request->filter) {
                    $query->where('nome', $request->filter);
                    $query->orWhere('descricao', 'LIKE', "%{$request->filter}%");
                }
            })
            ->paginate();

        return view('admin.paginas.perfis.index', compact('perfis', 'filters'));
    }
}

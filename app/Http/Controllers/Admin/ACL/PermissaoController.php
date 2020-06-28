<?php
namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermissao;
use App\Models\Permissao;
use Illuminate\Http\Request;

class PermissaoController extends Controller
{
    protected $repository;

    public function __construct(Permissao $permissao)
    {
        $this->repository = $permissao;
        $this->middleware(['can:permissoes']);
    }


    public function index()
    {
        $permissoes = $this->repository->orderby('nome')-> paginate();

        return view('admin.paginas.permissoes.index', compact('permissoes'));
    }


    public function create()
    {
        return view('admin.paginas.permissoes.create');
    }


    public function store(StoreUpdatePermissao $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('permissoes.index');
    }


    public function show($id)
    {
        if (!$permissao = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.paginas.permissoes.show', compact('permissao'));
    }


    public function edit($id)
    {
        if (!$permissao = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.paginas.permissoes.edit', compact('permissao'));
    }


    public function update(StoreUpdatePermissao $request, $id)
    {
        if (!$permissao = $this->repository->find($id)) {
            return redirect()->back();
        }

        $permissao->update($request->all());

        return redirect()->route('permissoes.index');
    }


    public function destroy($id)
    {
        if (!$permissao = $this->repository->find($id)) {
            return redirect()->back();
        }

        $permissao->delete();

        return redirect()->route('permissoes.index');
    }


    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $permissoes = $this->repository
            ->where(function($query) use ($request) {
                if ($request->filter) {
                    $query->where('nome', $request->filter);
                    $query->orWhere('descricao', 'LIKE', "%{$request->filter}%");
                }
            })
            ->paginate();

        return view('admin.paginas.permissoes.index', compact('permissoes', 'filters'));
    }
}

<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUpdateCategoria;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $repository;

    public function __construct(Categoria $categoria)
    {
        $this->repository = $categoria;
        $this->middleware(['can:categorias']);
        //$this->middleware('can:categorias')->only(['i                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ndex']); oderia ver ometodo marcado
    }


    public function index()
    {
        $categorias = $this->repository->latest()->paginate();

        return view('admin.paginas.categorias.index', compact('categorias'));
    }
                                                                                                                                                                                                                                                    

    public function create()
    {
        return view('admin.paginas.categorias.create');
    }


    public function store(StoreUpdateCategoria $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('categorias.index');
    }


    public function show($id)
    {
        if (!$categoria = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.paginas.categorias.show', compact('categoria'));
    }


    public function edit($id)
    {
        if (!$categoria = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.paginas.categorias.edit', compact('categoria'));
    }


    public function update(StoreUpdateCategoria $request, $id)
    {
        if (!$categoria = $this->repository->find($id)) {
            return redirect()->back();
        }

        $categoria->update($request->all());
        return redirect()->route('categorias.index');
    }


    public function destroy($id)
    {
        if (!$categoria = $this->repository->find($id)) {
            return redirect()->back();
        }

        $categoria->delete();
        return redirect()->route('categorias.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $categorias = $this->repository
            ->where(function($query) use ($request) {
                if ($request->filter) {
                    $query->orWhere('descricao', 'LIKE', "%{$request->filter}%");
                    $query->orWhere('nome', $request->filter);
                }
            })
            ->latest()
            ->paginate();

        return view('admin.paginas.categorias.index', compact('categorias', 'filters'));
    }
}

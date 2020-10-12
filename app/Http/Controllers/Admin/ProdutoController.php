<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUpdateProduto;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    private $repository;

    public function __construct(Produto $produto)
    {
        $this->repository = $produto;
        //$this->middleware(['can:produtos']);
    }


    public function index()
    {
        $produtos = $this->repository->latest()->paginate();
        return view('admin.paginas.produtos.index', compact('produtos'));
    }


    public function create()
    {
        return view('admin.paginas.produtos.create');
    }


    public function store(StoreUpdateProduto $request)
    {
        $data = $request->all();
        $empresa = auth()->user()->empresa;

        if ($request->hasFile('imagem') && $request->imagem->isValid()) {
            $data['imagem'] = $request->imagem->store("empresas/{$empresa->uuid}/produtos");
        }

        $this->repository->create($data);
        return redirect()->route('produtos.index');
    }


    public function show($id)
    {
        if (!$produto = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.paginas.produtos.show', compact('produto'));
    }


    public function edit($id)
    {
        if (!$produto = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.paginas.produtos.edit', compact('produto'));
    }



    public function update(StoreUpdateProduto $request, $id)
    {
        if (!$produto = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->all();
        $empresa = auth()->user()->empresa;

        if ($request->hasFile('imagem') && $request->imagem->isValid()) {

            if (Storage::exists($produto->imagem)) {
                Storage::delete($produto->imagem);

            }

            $data['imagem'] = $request->imagem->store("empresas/{$empresa->uuid}/produtos");
        }

        $produto->update($data);

        return redirect()->route('produtos.index');
    }


    public function destroy($id)
    {
        if (!$produto = $this->repository->find($id)) {
            return redirect()->back();
        }

        if (Storage::exists($produto->image)) {
            Storage::delete($produto->image);
        }

        $produto->delete();

        return redirect()->route('produtos.index');
    }



    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $produtos = $this->repository
            ->where(function($query) use ($request) {
                if ($request->filter) {
                    $query->orWhere('description', 'LIKE', "%{$request->filter}%");
                    $query->orWhere('title', $request->filter);
                }
            })
            ->latest()
            ->paginate();

        return view('admin.paginas.produtos.index', compact('produtos', 'filters'));
    }
}

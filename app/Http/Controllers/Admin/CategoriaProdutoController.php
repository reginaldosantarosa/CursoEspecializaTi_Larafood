<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class CategoriaProdutoController extends Controller
{

    protected $produto, $categoria;

    public function __construct(Produto $produto, Categoria $categoria)
    {
        $this->produto = $produto;
        $this->categoria = $categoria;
        $this->middleware(['can:produtos']);
    }

    public function categorias($idProduto)
    {
        if (!$produto = $this->produto->find($idProduto)) {
            return redirect()->back();
        }

        $categorias = $produto->categorias()->paginate();
        return view('admin.paginas.produtos.categorias.categorias', compact('produto', 'categorias'));
    }


    public function produtos($idCategoria)
    {
        if (!$categoria = $this->categoria->find($idCategoria)) {
            return redirect()->back();
        }

        $produtos = $categoria->produtos()->paginate();

        return view('admin.paginas.categorias.produtos.produtos', compact('categoria', 'produtos'));
    }


    public function categoriasDisponiveis(Request $request, $idProduto)
    {
        if (!$produto = $this->produto->find($idProduto)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $categorias = $produto->categoriasDisponiveis($request->filter);

        return view('admin.paginas.produtos.categorias.disponiveis', compact('produto', 'categorias', 'filters'));
    }


    public function attachCategoriasProduto(Request $request, $idProduto)
    {
        if (!$produto = $this->produto->find($idProduto)) {
            return redirect()->back();
        }

        if (!$request->categorias || count($request->categorias) == 0) {
            return redirect()
                ->back()
                ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $produto->categorias()->attach($request->categorias);
        return redirect()->route('produtos.categorias', $produto->id);
    }

    public function detachCategoriasProduto($idProduto, $idCategoria)
    {
        $produto = $this->produto->find($idProduto);
        $categoria = $this->categoria->find($idCategoria);

        if (!$produto || !$categoria) {
            return redirect()->back();
        }

        $produto->categorias()->detach($categoria);
        return redirect()->route('produtos.categorias', $produto->id);
    }
}

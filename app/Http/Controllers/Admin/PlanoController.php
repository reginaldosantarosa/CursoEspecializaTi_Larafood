<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlano;
use App\Models\Plano;
use Illuminate\Http\Request;


class PlanoController extends Controller
{
    private $repositorio;

    public function __construct(Plano $plano)
    {
        $this->repositorio = $plano;
    }
    public function index()
    {
        $planos = $this->repositorio->latest()->paginate();

        return view('admin.paginas.planos.index',
            ['planos' => $planos,
            ]);
    }

    public function create()
    {
        return view('admin.paginas.planos.create');
    }


    public function store(StoreUpdatePlano $request)
    {
        $this->repositorio->create($request->all());
        return redirect()->route('planos.index');
    }

    public function show($url)
    {
        $plano = $this->repositorio->where('url', $url)->first();

        if (!$plano)
            return redirect()->back();

        return view('admin.paginas.planos.show', [
            'plano' => $plano
        ]);
    }

    public function destroy($url)
    {
        $plano = $this->repositorio
           // ->with('detalhes')
            ->where('url', $url)
            ->first();

        if (!$plano)
            return redirect()->back();

        if ($plano->detalhes->count() > 0) {
            return redirect()
                ->back()
                ->with('error', 'Existem detalhes vinculados a esse plano, portanto não pode deletar');
        }

        $plano->delete();

        return redirect()->route('planos.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $planos = $this->repositorio->search($request->filter);

        return view('admin.paginas.planos.index', [
            'planos' => $planos,
            'filters' => $filters,
        ]);
    }

    public function edit($url)
    {

        $plano = $this->repositorio->where('url', $url)->first();

        if (!$plano)
            return redirect()->back();

        return view('admin.paginas.planos.edit', [
            'plano' => $plano
        ]);
    }

    public function update(StoreUpdatePlano $request, $url)
    {
        $plano = $this->repositorio->where('url', $url)->first();

        if (!$plano)
            return redirect()->back();

        $plano->update($request->all());

        return redirect()->route('planos.index');
    }

}

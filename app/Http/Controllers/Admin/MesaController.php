<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmpresaFormRequest;
use App\Http\Requests\StoreUpdateMesa;
use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    private $repository;

    public function __construct(Mesa $mesa)
    {
        $this->repository = $mesa;
     //   $this->middleware(['can:mesas']);
    }

    public function index()
    {
        $mesas = $this->repository->latest()->paginate();
        return view('admin.paginas.mesas.index', compact('mesas'));
    }

    public function create()
    {
        return view('admin.paginas.mesas.create');
    }

    public function store(StoreUpdateMesa $request)
    {
        $this->repository->create($request->all());
        return redirect()->route('mesas.index');
    }


    public function show($id)
    {
        if (!$mesa = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.paginas.mesas.show', compact('mesa'));
    }

    public function edit($id)
    {
        if (!$mesa = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.paginas.mesas.edit', compact('mesa'));
    }

    public function update(StoreUpdateMesa $request, $id)
    {
        if (!$mesa = $this->repository->find($id)) {
            return redirect()->back();
        }

        $mesa->update($request->all());
        return redirect()->route('mesas.index');
    }

    public function destroy($id)
    {
        if (!$mesa = $this->repository->find($id)) {
            return redirect()->back();
        }

        $mesa->delete();

        return redirect()->route('mesas.index');
    }


    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $mesas = $this->repository
            ->where(function($query) use ($request) {
                if ($request->filter) {
                    $query->orWhere('descricao', 'LIKE', "%{$request->filter}%");
                    $query->orWhere('identificacao', $request->filter);
                }
            })
            ->latest()
            ->paginate();

        return view('admin.paginas.mesas.index', compact('mesas', 'filters'));
    }

    public function qrcode($identificacao)
    {
        if (!$mesa = $this->repository->where('identificacao',$identificacao)->first()) {
            return redirect()->back();
        }

        $empresa= auth()->user()->empresa;

        $uri = env('URI_CLIENTE') ."/{$empresa->uuid}/{$mesa->uuid}" ;
        return view('admin.paginas.mesas.qrcode', compact('uri'));
    }
}

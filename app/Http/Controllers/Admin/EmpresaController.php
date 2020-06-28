<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEmpresa;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    private $repository;

    public function __construct(Empresa $empresa)
    {
        $this->repository = $empresa;
        $this->middleware(['can:empresas']);
    }


    public function index()
    {
        $empresas = $this->repository->latest()->paginate();

        return view('admin.paginas.empresas.index', compact('empresas'));
    }


    public function create()
    {
        return view('admin.paginas.empresas.create');
    }


    public function store(StoreUpdateEmpresa $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('empresas.index');
    }


    public function show($id)
    {
        if (!$empresa = $this->repository->with('plano')->find($id)) {
            return redirect()->back();
        }

        return view('admin.paginas.empresas.show', compact('empresa'));
    }


    public function edit($id)
    {
        if (!$empresa = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.paginas.empresas.edit', compact('empresa'));
    }

        public function update(StoreUpdateEmpresa $request, $id)
    {
        if (!$empresa = $this->repository->find($id)) {
            return redirect()->back();
        }

        $data = $request->all();

        if ($request->hasFile('logo') && $request->logo->isValid()) {

            if (Storage::exists($empresa->logo)) {
                Storage::delete($empresa->logo);
            }

            $data['logo'] = $request->logo->store("empresas/{$empresa->uuid}");
        }

        $empresa->update($data);

        return redirect()->route('empresas.index');
    }


    public function destroy($id)
    {
        if (!$empresa = $this->repository->find($id)) {
            return redirect()->back();
        }

        if (Storage::exists($empresa->logo)) {
            Storage::delete($empresa->logo);
        }

        $empresa->delete();

        return redirect()->route('empresas.index');
    }


    public function search(Request $request)
    {
        $filters = $request->only('filter');
        $empresas = $this->repository
            ->where(function($query) use ($request) {
                if ($request->filter) {
                    $query->where('nome', $request->filter);
                }
            })
            ->latest()
            ->paginate();

        return view('admin.paginas.empresas.index', compact('empresas', 'filters'));
    }
}

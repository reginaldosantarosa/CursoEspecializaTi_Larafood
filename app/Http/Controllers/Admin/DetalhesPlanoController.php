<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDetalhePlano;
use App\Models\DetalhesPlano;
use App\Models\Plano;
use Illuminate\Http\Request;

class DetalhesPlanoController extends Controller
{
    protected $repository, $plano;

    public function __construct(DetalhesPlano $detalhePlano, Plano $plano)
    {
        $this->repository = $detalhePlano;
        $this->plano = $plano;
    }

    public function index($url)
    {
        if (!$plano = $this->plano->where('url', $url)->first()) {
            return redirect()->back();
        }

        // $details = $plan->details();
        $detalhes = $plano->detalhes()->paginate();

        return view('admin.paginas.planos.detalhes.index', [
            'plano' => $plano,
            'detalhes' => $detalhes,
        ]);
    }

    public function create($urlPlan)
    {

        if (!$plano = $this->plano->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        return view('admin.paginas.planos.detalhes.create', [
            'plano' => $plano,
        ]);
    }



    public function store(StoreUpdateDetalhePlano $request, $urlPlan)
    {
        if (!$plano = $this->plano->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        // $data = $request->all();
        // $data['plan_id'] = $plan->id;
        // $this->repository->create($data);
        $plano->detalhes()->create($request->all());

        return redirect()->route('detalhes.plano.index', $plano->url);
    }

    public function edit($urlPlan, $idDetail)
    {
        $plano = $this->plano->where('url', $urlPlan)->first();
        $detalhe = $this->repository->find($idDetail);

        if (!$plano || !$detalhe) {
            return redirect()->back();
        }

        return view('admin.paginas.planos.detalhes.edit', [
            'plano' => $plano,
            'detalhe' => $detalhe,
        ]);
    }


    public function update(StoreUpdateDetalhePlano $request, $urlPlan, $idDetail)
    {
        $plano = $this->plano->where('url', $urlPlan)->first();
        $detalhe = $this->repository->find($idDetail);

        if (!$plano || !$detalhe) {
            return redirect()->back();
        }

        $detalhe->update($request->all());

        return redirect()->route('detalhes.plano.index', $plano->url);
    }

    public function show($urlPlan, $idDetail)

    {
        $plano = $this->plano->where('url', $urlPlan)->first();
        $detalhe = $this->repository->find($idDetail);

        if (!$plano || !$detalhe) {
            return redirect()->back();
        }

        return view('admin.paginas.planos.detalhes.show', [
            'plano' => $plano,
            'detalhe' => $detalhe,
        ]);
    }


    public function destroy($urlPlan, $idDetail)
    {
        $plano = $this->plano->where('url', $urlPlan)->first();
        $detalhe = $this->repository->find($idDetail);

        if (!$plano || !$detalhe) {
            return redirect()->back();
        }

        $detalhe->delete();

        return redirect()
            ->route('detalhes.plano.index', $plano->url)
            ->with('message', 'Registro deletado com sucesso');
    }

}

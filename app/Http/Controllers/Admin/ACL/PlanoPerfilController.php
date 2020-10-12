<?php


namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Plano;
use App\Models\Perfil;
use Illuminate\Http\Request;

class PlanoPerfilController extends Controller
{
    protected $plan, $perfil;

    public function __construct(Plano $plano, Perfil $perfil)
    {
        $this->plano = $plano;
        $this->perfil = $perfil;
       // $this->middleware(['can:planos']);
    }

    public function perfis($idPlano)
    {
        if (!$plano = $this->plano->find($idPlano)) {
            return redirect()->back();
        }

        $perfis = $plano->perfis()->paginate();
        return view('admin.paginas.planos.perfis.perfis', compact('plano', 'perfis'));
    }


    public function planos($idPerfil)
    {
        if (!$perfil = $this->perfil->find($idPerfil)) {
            return redirect()->back();
        }

        $planos = $perfil->planos()->paginate();
        return view('admin.paginas.perfis.planos.planos', compact('perfil', 'planos'));
    }


    public function perfisDisponiveis(Request $request, $idPlano)
    {
        if (!$plano = $this->plano->find($idPlano)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        $perfis = $plano->perfisDisponiveis($request->filter);

        return view('admin.paginas.planos.perfis.disponiveis', compact('plano', 'perfis', 'filters'));
    }


    public function attachPerfilPlano(Request $request, $idPlano)
    {
        if (!$plano = $this->plano->find($idPlano)) {
            return redirect()->back();
        }

        if (!$request->perfis || count($request->perfis) == 0) {
            return redirect()
                ->back()
                ->with('info', 'Precisa escolher pelo menos um perfil');
        }

        $plano->perfis()->attach($request->perfis);
        return redirect()->route('planos.perfis', $plano->id);
    }

    public function detachPerfilPlano($idPlano, $idPerfil)
    {
        $plano = $this->plano->find($idPlano);
        $perfil = $this->perfil->find($idPerfil);

        if (!$plano || !$perfil) {
            return redirect()->back();
        }

        $plano->perfis()->detach($perfil);
        return redirect()->route('planos.perfis', $plano->id);
    }
}

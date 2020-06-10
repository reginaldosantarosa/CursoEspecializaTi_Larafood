<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use App\Models\Permissao;
use Illuminate\Http\Request;

class PermissaoPerfilController extends Controller
{

     protected $perfil, $permissao;

    public function __construct(Perfil $perfil, Permissao $permissao)
    {
    $this->perfil = $perfil;
    $this->permissao = $permissao;
    //$this->middleware(['can:perfis']);
    }


    public function permissoes($idPerfil)
    {
        $perfil = $this->perfil->find($idPerfil);
        if (!$perfil) {
             return redirect()->back();
       }

        $permissoes = $perfil->permissoes()->paginate();
        return view('admin.paginas.perfis.permissoes.permissoes', compact('perfil', 'permissoes'));
    }


    public function permissoesDisponiveis(Request $request, $idPerfil)
    {

        if (!$perfil = $this->perfil->find($idPerfil)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');
        $permissoes = $perfil->permissoesDisponiveis($request->filter);

        return view('admin.paginas.perfis.permissoes.disponiveis', compact('perfil', 'permissoes', 'filters'));
    }


     //anexar
    public function attachPermissaoPerfil(Request $request, $idPerfil)
    {
        if (!$perfil = $this->perfil->find($idPerfil)) {
            return redirect()->back();
        }

        if (!$request->permissoes || count($request->permissoes) == 0) {
            return redirect()
                ->back()
                ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        //metodo interno attach ja anexa o vetor de permissoes na tabela intermediaria perfil_permissao
        $perfil->permissoes()->attach($request->permissoes);
        return redirect()->route('permissoes.perfis', $perfil->id);
    }



    public function perfis($idPermissao)
    {
    if (!$permissao = $this->permissao->find($idPermissao)) {
    return redirect()->back();
    }

    $perfis = $permissao->perfis()->paginate();

    return view('admin.paginas.permissoes.perfis.perfis', compact('permissao', 'perfis'));
    }



    public function detachPermissaoPerfil($idPerfil, $idPermissao)
    {
    $perfil = $this->perfil->find($idPerfil);
    $permissao = $this->permissao->find($idPermissao);

    if (!$perfil || !$permissao) {
    return redirect()->back();
    }

    $perfil->permissoes()->detach($permissao);
        return redirect()->route('perfis.permissoes', $perfil->id);
    }

}

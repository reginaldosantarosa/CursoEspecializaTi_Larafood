<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permissao;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissaoRoleController extends Controller
{
    protected $role, $permissao;

    public function __construct(Role $role, Permissao $permissao)
    {
        $this->role = $role;
        $this->permissao = $permissao;
      //  $this->middleware(['can:roles']);
    }

    public function permissoes($idRole)
    {
        $role = $this->role->find($idRole);

        if (!$role) {
            return redirect()->back();
        }

        $permissoes = $role->permissoes()->paginate();

        return view('admin.paginas.roles.permissoes.permissoes', compact('role', 'permissoes'));
    }


    public function roles($idPermissao)
    {
        if (!$permissao = $this->permissao->find($idPermissao)) {
            return redirect()->back();
        }

        $roles = $permissao->roles()->paginate();
        return view('admin.paginas.permissoes.roles.roles', compact('permissao', 'roles'));
    }


    public function permissoesDisponiveis(Request $request, $idRole)
    {
        if (!$role = $this->role->find($idRole)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissoes = $role->permissoesDisponiveis($request->filter);

        return view('admin.paginas.roles.permissoes.disponiveis', compact('role', 'permissoes', 'filters'));
    }


    public function attachPermissoesRole(Request $request, $idRole)
    {
        if (!$role = $this->role->find($idRole)) {
            return redirect()->back();
        }

        if (!$request->permissoes || count($request->permissoes) == 0) {
            return redirect()
                ->back()
                ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $role->permissoes()->attach($request->permissoes);

        return redirect()->route('roles.permissoes', $role->id);
    }

    public function detachPermissoesRole($idRole, $idPermissao)
    {
        $role = $this->role->find($idRole);
        $permissao = $this->permissao->find($idPermissao);

        if (!$role || !$permissao) {
            return redirect()->back();
        }

        $role->permissoes()->detach($permissao);

        return redirect()->route('roles.permissoes', $role->id);
    }
}

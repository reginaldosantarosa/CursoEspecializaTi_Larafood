<?php

namespace App\Models\Traits;

use App\Models\Empresa;

trait UserACLTrait
{
/*
    public function permissoes(): array
    {
        $empresa = $this->empresa;
        $plano = $empresa->plano;
        $permissoes = [];

        foreach ($plano->perfis as $perfil) {
            foreach ($perfil->permissoes as $permissao) {
                array_push($permissoes, $permissao->nome);
            }
        }
        return $permissoes;
    }
*/

    public function permissoes(): array
    {
        $permissoesPlano = $this->permissoesPlano();
        $permissoesRole = $this->permissoesRole();

        $permissoes = [];

        foreach ($permissoesRole as $permissao) {
            if (in_array($permissao, $permissoesPlano))
                array_push($permissoes, $permissao);
        }

        return $permissoes;
    }

    public function permissoesPlano(): array
    {
        // $empresa = $this->tenant;
        // $plano = $empresa->plan;
        $empresa = Empresa::with('plano.perfis.permissoes')->where('id', $this->empresa_id)->first();
        $plano = $empresa->plano;

        $permissoes = [];
        foreach ($plano->perfis as $perfil) {
            foreach ($perfil->permissoes as $permissao) {
                array_push($permissoes, $permissao->name);
            }
        }

        return $permissoes;
    }

    public function permissoesRole(): array
    {
        $roles = $this->roles()->with('permissoes')->get();

        $permissoes = [];
        foreach ($roles as $role) {
            foreach ($role->permissoes as $permissao) {
                array_push($permissoes, $permissao->nome);
            }
        }

        return $permissoes;
    }

    public function hasPermissao(string $permissaoNome): bool
    {
        return in_array($permissaoNome, $this->permissoes());
    }

    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

    //se nao for admin,poderia ser um empresa simples
    public function isEmpresa(): bool
    {
        return !in_array($this->email, config('acl.admins'));
    }
}

<?php

namespace App\Services;

use App\Models\Plano;
use Illuminate\Support\Str;

class EmpresaService
{
    private $plano, $data = [];
    public function make(Plano $plano, array $data)
    {
        $this->plano = $plano;
        $this->data = $data;
        $empresa = $this->storeEmpresa();
        $user = $this->storeUser($empresa);
        return $user;
    }

    public function storeEmpresa()
    {
        $data = $this->data;

        return $this->plano->empresas()->create([
            'cnpj' => $data['cnpj'],
            'nome' => $data['empresa'],
            'email' => $data['email'],
            'url' => Str::kebab($data['empresa']),
            'inscricao' => now(),
            'expira_acesso' => now()->addDays(7),
        ]);
    }

    public function storeUser($empresa)
    {
        $user = $empresa->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);

        return $user;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $fillable = ['nome', 'descricao'];


    public function perfis()
    {   // return $this->belongsToMany(Perfil::class, 'perfil_permissao');
        return $this->belongsToMany(Perfil::class); //Uma permissao pertence a varios perfis
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class); //Ume Permissão  possui varios cargos/roles
    }


}

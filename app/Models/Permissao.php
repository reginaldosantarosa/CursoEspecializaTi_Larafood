<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $fillable = ['nome', 'descricao'];


    /**
     * Get Perfis
     */
    public function perfis()
    {   // return $this->belongsToMany(Perfil::class, 'perfil_permissao');
        return $this->belongsToMany(Perfil::class);
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


}

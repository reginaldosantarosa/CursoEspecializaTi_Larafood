<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;  //adicionado

//aletrado a extends
class Cliente extends  Authenticatable
{
    use HasApiTokens;   //adicionado
    protected $fillable = [
        'nome', 'email', 'password', 'empresa_id',
    ];

    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class);//um cliente possui varias avaliaçõe
    }

    public function pedidos()
    {
        return $this->hasMany(Avaliacao::class);//um cliente possui vários pedidos
    }
}

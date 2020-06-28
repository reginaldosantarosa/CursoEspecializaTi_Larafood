<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


//tenat
class Empresa extends Model
{
    protected $fillable = [
        'cnpj', 'nome', 'url', 'email', 'logo', 'ativo', 'inscricao', 'expira_acesso', 'inscricao_id', 'inscricao_ativa', 'inscricao_suspensa',
    ];

    public function plano(){
        return $this->belongsTo(Plano::class); // Uma empresa  possui um plano
    }

    public function users()
    {
        return $this->hasMany(User::class); // Uma empresa possui muitos usuarios
    }

}

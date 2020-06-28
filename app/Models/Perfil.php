<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = ['nome', 'descricao'];


    public function permissoes()    {

        return $this->belongsToMany(Permissao::class);  // Um perfil  possui varias permissoes
    }

    public function planos()
    {
        return $this->belongsToMany(Plano::class); //Um perfil pertence varios planos
    }

    public function permissoesDisponiveis($filter = null)
    {

        $permissoes = Permissao::whereNotIn('permissaos.id', function($query) {
            $query->select('perfil_permissao.permissao_id');
            $query->from('perfil_permissao');
            $query->whereRaw("perfil_permissao.perfil_id={$this->id}");
        })->paginate();

        return $permissoes;
    }

}

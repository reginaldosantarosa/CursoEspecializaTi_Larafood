<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $fillable = ['nome', 'descricao'];

    /**
     * Get Permissoes
     */
    public function permissoes()    {

        return $this->belongsToMany(Permissao::class);  // u perfil de muitas permissoes, uma permissao em muitos perfis
    }

    public function planos()
    {
        return $this->belongsToMany(Plano::class);
    }


    public function permissoesDisponiveis($filter = null)
    {

        $permissoes = Permissao::whereNotIn('permissaos.id', function($query) {
            $query->select('perfil_permissao.permissao_id');
            $query->from('perfil_permissao');
            $query->whereRaw("perfil_permissao.perfil_id={$this->id}");
        })


         //   ->where(function ($queryFilter) use ($filter) {
           //     if ($filter)
             //       $queryFilter->where('permissaos.nome', 'LIKE', "%{$filter}%");
           // })

            // toSql();
            ->paginate();

        //dd($permissoes);
        return $permissoes;
    }

}

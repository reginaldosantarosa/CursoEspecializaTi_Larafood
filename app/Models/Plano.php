<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = ['nome', 'url', 'preco', 'descricao'];

    public function perfis()
    {
        return $this->belongsToMany(Perfil::class); //Um plano possui variso perfis
    }

    public function empresas()
    {
        return $this->hasMany(Empresa::class); //Um Plano possui muitos empresas
    }

    public function detalhes()
    {
        return $this->hasMany(DetalhesPlano::class); //Uum plano ṕossui varios detalhes
    }

    public function search($filter = null)
    {
        $resultados = $this->where('nome', 'LIKE', "%{$filter}%")
            ->orWhere('descricao', 'LIKE', "%{$filter}%")
            ->paginate();
        return $resultados;
    }

    public function perfisDisponiveis($filter = null)
    {
        $perfis = Perfil::whereNotIn('perfils.id', function($query) {
            $query->select('perfil_plano.perfil_id');
            $query->from('perfil_plano');
            $query->whereRaw("perfil_plano.plano_id={$this->id}");
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter)
                    $queryFilter->where('perfils.nome', 'LIKE', "%{$filter}%");
            })
            ->paginate();

        return $perfis;
    }





}

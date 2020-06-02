<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plano extends Model
{
    protected $fillable = ['nome', 'url', 'preco', 'descricao'];


    public function search($filter = null)
    {
        $resultados = $this->where('nome', 'LIKE', "%{$filter}%")
            ->orWhere('descricao', 'LIKE', "%{$filter}%")
            ->paginate();

        return $resultados;
    }

    public function detalhes()
    {
        return $this->hasMany(DetalhesPlano::class); /*um plano pertennce unico detlahe*/
    }
}

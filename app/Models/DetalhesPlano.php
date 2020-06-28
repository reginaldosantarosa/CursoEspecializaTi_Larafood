<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalhesPlano extends Model
{
    protected $fillable = ['nome'];

    public function plano()
    {
        $this->belongsTo(Plano::class);   //Um detalhesDePlano pertence a um plano
    }
}

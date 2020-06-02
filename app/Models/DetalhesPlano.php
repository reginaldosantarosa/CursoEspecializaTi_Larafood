<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalhesPlano extends Model
{
    protected $fillable = ['nome'];
    public function plano()    /*olha em relação ao metodo: muitos para um*/
    {
        $this->belongsTo(Plano::class);   /*detalhe de plano pode pertencer a varios planos*/
    }
}

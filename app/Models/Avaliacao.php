<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected  $table="avaliacao_pedido";
    protected $fillable = ['pedido_id', 'cliente_id', 'estrelas', 'comentario'];

    public function pedido(){
        return $this->belongsTo(Pedido::class);//uma avaliação pertence a um unico pedido
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);//uma avaliação pertence a um unico cliente
    }

}

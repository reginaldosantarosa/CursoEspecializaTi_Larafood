<?php

namespace App\Models;

use App\Empresa\Traits\EmpresaTrait;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use EmpresaTrait;


    protected $fillable = ['empresa_id', 'identificacao', 'cliente_id', 'mesa_id', 'total', 'status', 'comentario'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class); // Um pedido  pertence uma empresa
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class); // Um pedido pertence a um cliente
    }

    public function mesa()
    {
        return $this->belongsTo(Mesa::class); // Um pedido pertence a uma mesa
    }

    public function produtos()
    {
        return $this->belongsToMany(Produto::class); //Um pedido possui varios produutos
    }


    public function avaliacoes()
    {
        return $this->hasMany(Avaliacao::class);//
    }

}

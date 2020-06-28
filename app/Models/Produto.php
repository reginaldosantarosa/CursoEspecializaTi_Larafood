<?php

namespace App\Models;

use App\Empresa\Traits\EmpresaTrait;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use EmpresaTrait;

    protected $fillable = ['titulo', 'flag', 'preco', 'descricao', 'imagem'];

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class); //Um produto possui varias categorias
    }


    public function categoriasDisponiveis($filter = null)
    {
        $categorias = Categoria::whereNotIn('categorias.id', function($query) {
            $query->select('categoria_produto.categoria_id');
            $query->from('categoria_produto');
            $query->whereRaw("categoria_produto.produto_id={$this->id}");
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter)
                    $queryFilter->where('categorias.nome', 'LIKE', "%{$filter}%");
            })
            ->paginate();

        return $categorias;
    }


}

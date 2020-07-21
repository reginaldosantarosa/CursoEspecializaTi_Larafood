<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nome', 'descricao'];

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class); //Um Role possui varias usuarios
    }


    public function permissoesDisponiveis($filter = null)
    {
        $permissoes = Permissao::whereNotIn('permissaos.id', function($query) {
            $query->select('permissao_role.permissao_id');
            $query->from('permissao_role');
            $query->whereRaw("permissao_role.role_id={$this->id}");
        })
            ->where(function ($queryFilter) use ($filter) {
                if ($filter)
                    $queryFilter->where('permissaos.nome', 'LIKE', "%{$filter}%");
            })
            ->paginate();

        return $permissoes;
    }
}

<?php

namespace App\Models;

use App\Empresa\Traits\EmpresaTrait;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use EmpresaTrait;

    protected $fillable = ['identificacao', 'descricao'];
}

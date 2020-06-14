<?php

namespace App\Empresa\Observers;

use App\Empresa\ManagerEmpresa;
use Illuminate\Database\Eloquent\Model;

class EmpresaObserver
{
    /**
     * Handle the $model "creating" event.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function creating(Model $model)
    {
        $managerEmpresa = app(ManagerEmpresa::class);
        $model->empresa_id = $managerEmpresa->getEmpresaIdentificacao();

    }
}

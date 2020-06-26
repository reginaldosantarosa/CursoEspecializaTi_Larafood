<?php

namespace App\Empresa\Traits;

use App\Empresa\Observers\EmpresaObserver;
use App\Empresa\Scopes\EmpresaScope;


trait EmpresaTrait
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::observe(EmpresaObserver::class);


        //aqui, como o EmpresaTraint e chamado no modelo de Empresa, quando ele manipula, ja adiciona automatico
        //a clausa where desse escopoglobal
        //static::addGlobalScope(app(EmpresaScope::class)); oura opção
        static::addGlobalScope(new EmpresaScope);
    }


}
/*
Na trait: TenantTrait,
           usei:  app(TenantScope::class)
ao invés de: new TenantScope

*/

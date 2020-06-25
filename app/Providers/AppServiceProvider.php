<?php

namespace App\Providers;

use App\Models\Categoria;
use App\Models\Empresa;
use App\Models\Plano;
use App\Models\Produto;
use App\Observers\CategoriaObserver;
use App\Observers\EmpresaObserver;
use App\Observers\PlanoObserver;
use App\Observers\ProdutoObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Plano::observe(PlanoObserver::class);
        Empresa::observe(EmpresaObserver::class);
        Categoria::observe(CategoriaObserver::class);
        Produto::observe(ProdutoObserver::class);
    }
}

<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('Admin')
 //   ->middleware('auth')
    ->group(function() {



                 /**
                  * Routes Permissions
                  */
                 Route::any('permissoes/search', 'ACL\PermissaoController@search')->name('permissoes.search');
                 Route::resource('permissoes', 'ACL\PermissaoController');



             /**
              * Routes Profiles
              */
             Route::any('perfis/search', 'ACL\PerfisController@search')->name('perfis.search');
             Route::resource('perfis', 'ACL\PerfisController');



     //detlhes plano
             Route::get('planos/{url}/detalhes/create', 'DetalhesPlanoController@create')->name('detalhes.plano.create');
             Route::delete('planos/{url}/detalhes/{idDetalhe}', 'DetalhesPlanoController@destroy')->name('detalhes.plano.destroy');
             Route::get('planos/{url}/detalhes/{idDetalhe}', 'DetalhesPlanoController@show')->name('detalhes.plano.show');
             Route::put('planos/{url}/detalhes/{idDetalhe}', 'DetalhesPlanoController@update')->name('detalhes.plano.update');
             Route::get('planos/{url}/detalhes/{idDetalhe}/edit', 'DetalhesPlanoController@edit')->name('detalhes.plano.edit');
             Route::post('planos/{url}/detalhes', 'DetalhesPlanoController@store')->name('detalhes.plano.store');
             Route::get('planos/{url}/detalhes', 'DetalhesPlanoController@index')->name('detalhes.plano.index');

            //planos
            Route::get('planos/create', 'PlanoController@create')->name('planos.create');
            Route::put('planos/{url}', 'PlanoController@update')->name('planos.update');
            Route::get('planos/{url}/edit', 'PlanoController@edit')->name('planos.edit');
            Route::any('planos/search', 'PlanoController@search')->name('planos.search');
            Route::delete('planos/{url}', 'PlanoController@destroy')->name('planos.destroy');
            Route::get('planos/{url}', 'PlanoController@show')->name('planos.show');
            Route::post('planos', 'PlanoController@store')->name('planos.store');
            Route::get('planos', 'PlanoController@index')->name('planos.index');

        /**
         * Home Dashboard
         */
        Route::get('/', 'PlanoController@index')->name('admin.index');


    });


/**
 *     Route::delete('plans/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
Route::get('plans/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
Route::get('plans/{url}/details/{idDetail}', 'DetailPlanController@show')->name('details.plan.show');
Route::put('plans/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
Route::get('plans/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
Route::post('plans/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

 */

<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function() {

            //categorias
            Route::any('categorias/search', 'CategoriaController@search')->name('categorias.search');
            Route::resource('categorias', 'CategoriaController');


             //usuarios
             Route::any('usuarios/search', 'UsuarioController@search')->name('usuarios.search');
             Route::resource('usuarios', 'UsuarioController');

             //Plano x Perfil
             Route::get('planos/{id}/perfil/{idPerfil}/detach', 'ACL\PlanoPerfilController@detachPerfilPlano')->name('planos.perfis.detach');
             Route::post('planos/{id}/perfis', 'ACL\PlanoPerfilController@attachPerfilPlano')->name('planos.perfis.attach');
             Route::any('planos/{id}/perfis/create', 'ACL\PlanoPerfilController@perfisDisponiveis')->name('planos.perfis.disponiveis');
             Route::get('planos/{id}/perfis', 'ACL\PlanoPerfilController@perfis')->name('planos.perfis');
             Route::get('perfis/{id}/planos', 'ACL\PlanoPerfilController@planos')->name('perfis.planos');

             //Permissao x Perfil
             Route::get('perfis/{id}/permissao/{idPermissao}/detach', 'ACL\PermissaoPerfilController@detachPermissaoPerfil')->name('perfis.permissoes.detach');
             Route::post('perfis/{id}/permissoes', 'ACL\PermissaoPerfilController@attachPermissaoPerfil')->name('perfis.permissoes.attach');
             Route::any('perfis/{id}/permissoes/create', 'ACL\PermissaoPerfilController@permissoesDisponiveis')->name('perfis.permissoes.disponiveis');
             Route::get('perfis/{id}/permissoes', 'ACL\PermissaoPerfilController@permissoes')->name('permissoes.perfis');
             Route::get('permissoes/{id}/perfil', 'ACL\PermissaoPerfilController@perfis')->name('perfis.permissoes');

             //permissoes
             Route::any('permissoes/search', 'ACL\PermissaoController@search')->name('permissoes.search');
             Route::resource('permissoes', 'ACL\PermissaoController');

             //perfis
             Route::any('perfis/search', 'ACL\PerfisController@search')->name('perfis.search');
             Route::resource('perfis', 'ACL\PerfisController');

             //detalhes plano
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

             //Home Dashboard
             Route::get('/', 'PlanoController@index')->name('admin.index');
    });

Auth::routes();
//Auth::routes(['register'=false) ; ele desabilita a rosta padrão que é register

Route::get('plano/{url}','Site\SiteController@plano')->name('plano.inscricao');
Route::get('/','Site\SiteController@index')->name('site.home');

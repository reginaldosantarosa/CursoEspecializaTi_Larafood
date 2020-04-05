<?php
Route::prefix('admin')
    ->namespace('Admin')
 //   ->middleware('auth')
    ->group(function() {

        /**
         * Routes Planos
         */
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

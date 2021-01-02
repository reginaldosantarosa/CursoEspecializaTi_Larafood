<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return response()->json(['message'=>'ok']);
});

/*
Route::get('/teste',function(){
            $cliente=\App\Models\Cliente::first();
            $token=$cliente->createToken("token-teste");
            dd($token->plainTextToken);
});

*/

Route::post('/auth/registro', 'Api\Auth\RegistroController@store');
Route::post('/auth/token', 'Api\Auth\AuthClienteController@auth');


Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'
], function () {

    Route::get('/empresas', 'EmpresaApiController@index');
    Route::get('/empresas/{uuid}', 'EmpresaApiController@show');

    Route::get('/categorias/{identify}', 'CategoriaApiController@show');
    Route::get('/categorias', 'CategoriaApiController@categorasByEmpresa');

    Route::get('/mesas/{identify}', 'MesaApiController@show');
    Route::get('/mesas', 'MesaApiController@mesasByEmpresa');

    Route::get('/produtos/{identify}', 'ProdutoApiController@show');
    Route::get('/produtos', 'ProdutoApiController@produtosByEmpresa');

    Route::post('/pedidos', 'PedidoApiController@store');
    Route::get('/pedidos/{identify}', 'PedidoApiController@show');



}
);

Route::group(
    ['middleware' => ['auth:sanctum']]
    , function () {
    Route::get('/auth/me', 'Api\Auth\AuthClienteController@me');
    Route::post('/auth/logout', 'Api\Auth\AuthClienteController@logout');

    Route::post('/auth/v1/pedidos/{identificacaoPedido}/avaliacoes', 'Api\AvaliacaoApiController@store');
    Route::get('/auth/v1/meus-pedidos', 'Api\PedidoApiController@meusPedidos');
    Route::post('/auth/v1/pedidos', 'Api\PedidoApiController@store');
});



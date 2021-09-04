<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', 'Auth\LoginController@index');

Route::get('/sobre-nos', 'SobreNosController@sobrenos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@contato')->name('site.contato');

Route::get('/login', 'LoginController@index')->name('site.login');

Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){echo 'clientes';})->name('app.clientes');
    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::get('/produtos', function(){echo 'produtos';})->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}','TesteController@index')->name('site.rota1');

Route::get('/rota2', function(){
    return redirect()->route('site.rota1');
})->name('site.rota2');

// Rota de fallback (contigÃªncia), ou seja, quando nÃ£o encontrar outras rotas
Route::fallback(function(){
    echo 'Rota nÃ£o existe. Clique <a href="'.route('site.index').'"> aqui</a> para retornar'; 
});


/*
// enviado parametros {nome}/{idade} etc
Route::get('/contato/{nome}/{categoria_id?}', function(string $nome, int $categoria_id = 1){
    
    echo "estamos aqui no callback. Parametro enviado: $nome - $categoria_id";
})->where('categoria_id', '[0-9]+')->where('nome','[A-Za-z]+');
//where sÃ£o pÃ³s mÃ©todos. '[x-x]' sao expressÃµes regulares que validam o valor dos parÃ¢metros
*/
/*
Verbos HTTP

get (caminho,acao)
post
put
patch
delete 
options

Quando adiconado uma string, o framework interpreta que isso serÃ¡ uma
action de um controlador, seperando ele por: NomeController@metodo

*/


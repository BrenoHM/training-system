<?php

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

Route::get('/', function () {
	if( Auth::check() ){
		return redirect()->route('home');
	}else{
		return redirect()->route('login');
	}
});

Auth::routes();

Route::get('/home', 'DashboardController@dashboard')->name('home');
Route::get('/dashboard/v2', 'DashboardController@versiontwo')->name('v2');
Route::get('/dashboard/v3', 'DashboardController@versionthree')->name('v3');

Route::resource('categorias', 'CategoriasController');
Route::resource('cursos', 'CursosController');
Route::resource('modulos', 'ModulosController');
Route::resource('inscricoes', 'InscricoesController');
Route::get('/modulos/list/{idCurso}', 'ModulosController@list');
Route::delete('/modulos/{modulo}/delete', 'ModulosController@delete');
Route::resource('conteudos', 'ConteudosController');
Route::resource('atividades', 'AtividadesController');
Route::get('/atividades/list/{idModulo}', 'AtividadesController@list');

Route::get('/avaliacao/{idCurso}', 'AvaliacoesController@create')->name('avaliacao.create');
Route::post('/avaliacao', 'AvaliacoesController@store')->name('avaliacao.store');

Route::post('/anotacao', 'ConteudosController@anotacao');
Route::get('/minhas-anotacoes', 'ConteudosController@minhasAnotacoes');

Route::get('/meus-cursos', 'CursosController@meusCursos');

Route::resource('usuarios', 'UserController');

Route::get('/certificado/{idCurso}', 'CursosController@certificado')->name('certificado');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

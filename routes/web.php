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
	return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'DashboardController@dashboard')->name('home');

Route::resource('categorias', 'CategoriasController');
Route::resource('cursos', 'CursosController');
Route::resource('modulos', 'ModulosController');
Route::resource('inscricoes', 'InscricoesController');
Route::get('/modulos/list/{idCurso}', 'ModulosController@list');
Route::delete('/modulos/{modulo}/delete', 'ModulosController@delete');
Route::resource('conteudos', 'ConteudosController');
Route::resource('atividades', 'AtividadesController');
Route::resource('tentativas', 'TentativasController');
Route::resource('respostas', 'RespostasController');
Route::get('/atividades/list/{idModulo}', 'AtividadesController@list');
Route::post('/pergunta', 'AtividadesController@cadastraPergunta')->name('pergunta.cadastrar');
Route::get('/revisao/{idTentativa}', 'TentativasController@revisao')->name('revisao');

Route::get('/avaliacao/{idCurso}', 'AvaliacoesController@create')->name('avaliacao.create');
Route::post('/avaliacao', 'AvaliacoesController@store')->name('avaliacao.store');
Route::post('/avaliacao/mais', 'AvaliacoesController@assessmentsDemanda')->name('avaliacoes.mais');

Route::post('/anotacao', 'ConteudosController@anotacao');
Route::get('/minhas-anotacoes', 'ConteudosController@minhasAnotacoes');

Route::get('/meus-cursos', 'CursosController@meusCursos');

Route::resource('usuarios', 'UserController');
Route::get('/evolucao/{idUsuario}', 'UserController@evolucao')->name('evolucao');

Route::get('/certificado/{idCurso}', 'CursosController@certificado')->name('certificado');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

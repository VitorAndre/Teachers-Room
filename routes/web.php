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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rota para a busca e cadastro de metodologias
Route::resource('metodologia', 'BuscarController');

//Rota para a avaliação de metodologias
Route::resource('avaliacao', 'AvaliacaoController');

//Rota para vizualização de requisições de metodologias por parte do Admin
Route::resource('requisicao_metodologia', 'MetodologiaAdminController');

//Rota para vizualização de requisições de usuarios por parte do Admin
Route::resource('requisicao_usuarios', 'UserAdminController');

//Rota para definir novos admins
Route::resource('novo_admin', 'AdminController');

//Rota para atualizar matrícula
Route:Route::resource('matricula', 'MatriculaController');

//Rota para logar com rede social
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback','SocialController@Callback');

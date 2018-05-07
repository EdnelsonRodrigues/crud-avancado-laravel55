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
    return view('auth.login');
});

Auth::routes();

$this->group(['middleware' => ['auth']/*, 'namespace' => 'Painel', 'prefix' => 'painel'*/], function (){

	//dashboard
	$this->get('/', 'HomeController@index');

	//contatos
	$this->get('contatos', 'ContatoController@index')->name('contatos.index');
	$this->get('contatos/novo', 'ContatoController@novo')->name('contatos.novo');
	$this->post('contatos', 'ContatoController@store')->name('contatos.store');

});

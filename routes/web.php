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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//rotas admin

Route::get('/admin/dash', 'AdminController@index')->name('admin.dashboard');

Route::get('/admin/login', 'Auth\AdminloginControler@index')->name('admin.login');

Route::post('/admin/login', 'Auth\AdminloginControler@login')->name('admin.login.submit');

//rotas admin

//rotas usuario colaborador

Route::get('/colab', 'ColaboradorController@index')->name('colaborador.dashboard');

Route::get('/colab/login', 'Auth\ColaboradorloginControler@index')->name('colab.login');

Route::post('/colab/login', 'Auth\ColaboradorloginControler@login')->name('colab.login.submit');

//rotas usuario colaborador

//rota upload
Route::post('/upload', 'uploadController@salvarArquivo')->name('anexo');
//rota upload

//rotas relatorio

Route::get('/relatorio/admin', 'relatorioadminControler@index')->name('ralatorioadmin');

Route::post('/relatorio/admin/busca', 'relatorioadminControler@busca')->name('relatorioadminbusca');

Route::post('/colab/busca', 'ColaboradorController@busca')->name('relatorioanalistabusca');



//rotas relatorio





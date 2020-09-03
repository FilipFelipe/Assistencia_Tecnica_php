<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::get('/registrar', 'Auth\RegisterController@index')->name('registrar');
Route::post('/registrar', 'Auth\RegisterController@registrar')->name('registrar_usuario');
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();


//Funcionarios
Route::get('/funcionario', 'FuncionarioController@index')->name('listar_funcionario');
Route::get('/novo_funcionario', 'FuncionarioController@novo_funcionario')->name('novo_funcionario');
Route::get('/funcionario/{id}', 'FuncionarioController@visualizar_funcionario')->name('visualizar_');
Route::get('/funcionario/alterar/{id}', 'FuncionarioController@alterar_funcionario')->name('alterar_funcionario');
Route::get('/funcionario/excluir/{id}', 'FuncionarioController@excluir_funcionario')->name('excluir_funcionario');
Route::post('/alterar_funcionario/{id}', 'FuncionarioController@alterar')->name('alterar');
Route::post('/excluir_funcionario/{id}', 'FuncionarioController@excluir')->name('excluir');
Route::post('/salvar_funcionario', 'FuncionarioController@salvar_funcionario')->name('salvar_funcionario');

//Usuarios
Route::get('/usuario', 'UsuarioController@index')->name('listar_usuario');
Route::get('/novo_usuario', 'UsuarioController@novo_usuario')->name('novo_usuario');
Route::post('/salvar_usuario', 'UsuarioController@salvar_usuario')->name('salvar_usuario');
Route::get('/usuario/{id}', 'UsuarioController@visualizar_usuario')->name('visualizar_usuario');
Route::get('/usuario/alterar/{id}', 'UsuarioController@alterar_usuario')->name('alterar_usuario');
Route::post('/alterar_usuario/{id}', 'UsuarioController@alterar')->name('alterar');
Route::get('/usuario/excluir/{id}', 'UsuarioController@excluir_usuario')->name('excluir_usuario');
Route::post('/excluir_usuario/{id}', 'UsuarioController@excluir')->name('excluir');

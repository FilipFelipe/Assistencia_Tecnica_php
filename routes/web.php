<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/login', 'Auth\LoginController@carregalogin')->name('page.login');
//Route::get('/', 'Auth\LoginController@carregalogin');
Route::post('/login', 'Auth\LoginController@login')->name('user.login');
Route::get('/cadastro', 'Auth\RegisterController@index')->name('cadastro');
Route::post('/cadastro', 'Auth\RegisterController@registrar')->name('cadastro_usuario');
Route::get('/verify_account', 'Auth\RegisterController@verify_account')->name('verify_account');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
//Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index');

Route::get('/usuario/mailpage', 'Auth\RegisterController@mailpage')->name('mailpage');
Route::post('/usuario/recuperar/senha', 'Auth\RegisterController@forgotPassword')->name('forgotPassword');
Route::post('/reset_password', 'Auth\RegisterController@resetpassword')->name('resetpassword');

Route::post('/excluir/{id}', 'UsuarioController@excluir')->name('excluir');
Route::middleware(['auth']) ->group(function (){
    Route::prefix('funcionario')->group(function () {
        Route::get('/', 'FuncionarioController@index')->name('listar_funcionario');
        Route::get('/novo', 'FuncionarioController@novo_funcionario')->name('novo_funcionario');
        Route::get('/{id}', 'FuncionarioController@visualizar_funcionario')->name('visualizar_');
        Route::get('/alterar/{id}', 'FuncionarioController@alterar_funcionario')->name('alterar_funcionario');
        Route::get('/excluir/{id}', 'FuncionarioController@excluir_funcionario')->name('excluir_funcionario');
        Route::post('/alterar/{id}', 'FuncionarioController@alterar')->name('alterar_funcionario_post');
        Route::post('/excluir/{id}', 'FuncionarioController@excluir')->name('excluir_funcionario_post');
        Route::post('/salvar', 'FuncionarioController@salvar_funcionario')->name('salvar_funcionario');
    });
    Route::prefix('usuario')->group(function () {
        Route::get('/', 'UsuarioController@index')->name('listar_usuario');
        Route::get('/novo', 'UsuarioController@novo_usuario')->name('novo_usuario');
        Route::get('/{id}', 'UsuarioController@visualizar_usuario')->name('visualizar_usuario');
        Route::get('/alterar/{id}', 'UsuarioController@alterar_usuario')->name('alterar_usuario');
        Route::get('/excluir/{id}', 'UsuarioController@excluir_usuario')->name('excluir_usuario');
        Route::post('/excluir/{id}', 'UsuarioController@excluir')->name('excluir');
        Route::post('/alterar/{id}', 'UsuarioController@alterar')->name('alterar');
        Route::post('/salvar', 'UsuarioController@salvar_usuario')->name('salvar_usuario');
    });
    Route::prefix('ordem_servico')->group(function () {
        Route::get('/', 'OrdemServicoController@index')->name('listar_ordem');
        Route::get('/novo', 'OrdemServicoController@nova_ordem')->name('nova_ordem');
        Route::get('/{id}', 'OrdemServicoController@consultar_ordem')->name('consultar_ordem');
        Route::get('/alterar/{id}', 'OrdemServicoController@alterar')->name('alterar_ordem');
        Route::get('/excluir/{id}', 'OrdemServicoController@excluir_ordem')->name('excluir_ordem');
        Route::post('/excluir/{id}', 'OrdemServicoController@excluir')->name('excluir_ordem_post');
        Route::post('/alterar/{id}', 'OrdemServicoController@alterar_ordem')->name('alterar_ordem_post');
        Route::post('/salvar', 'OrdemServicoController@salvar_ordem')->name('salvar_ordem');
    });
    
});



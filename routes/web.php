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

Route::get('/', ['as' => 'home', 'uses' => 'Auth\LoginController@home']);
Route::get('/politica-de-privacidade', ['as' => 'privacy', 'uses' => 'InvestmentController@privacy']);

#Rotas gerenciador
Route::get('/gerenciador', ['as' => 'manager', 'uses' => 'ManagerController@index']);
Route::get('/gerenciador/conta-recorrente', ['as' => 'recurrent', 'uses' => 'ManagerController@recurrent']);
Route::post('/gerenciador/conta', ['as' => 'expense.store', 'uses' => 'ManagerController@expenseStore']);
Route::get('/gerenciador/remover-conta/{id}', ['as' => 'expense.delete', 'uses' => 'ManagerController@expenseDelete']);
Route::get('/gerenciador/conta', ['as' => 'expense', 'uses' => 'ManagerController@expense']);
Route::get('/gerenciador/renda-extra', ['as' => 'extra', 'uses' => 'ManagerController@extra']);
#investimentos
Route::get('/investimentos', ['as' => 'investment', 'uses' => 'InvestmentController@index']);

#Rotas perfil
Route::get('/perfil', ['as' => 'profile', 'uses' => 'UserController@index']);
Route::post('/perfil/{id}', ['as' => 'profile.update', 'uses' => 'UserController@update']);

#rotas de Login
Route::get('usuario/redirect-google', ['as' => 'social.google.redirect', 'uses' => 'Auth\LoginController@googleRedirect']);
Route::get('usuario/cadastro-google', ['as' => 'social.google.register', 'uses' => 'Auth\LoginController@googleReturn']);

Route::get('usuario/redirect-facebook', ['as' => 'social.facebook.redirect', 'uses' => 'Auth\LoginController@facebookRedirect']);
Route::get('usuario/cadastro-facebook', ['as' => 'social.facebook.register', 'uses' => 'Auth\LoginController@facebookReturn']);

Route::get('usuario/cadastrar', ['as' => 'user.register', 'uses' => 'UserController@register']);
Route::post('usuario/cadastro', ['as' => 'register', 'uses' => 'Auth\RegisterController@create']);
Route::post('/', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

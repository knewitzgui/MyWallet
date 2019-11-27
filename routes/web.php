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

Route::get('/', function () { return view('login');} );

#Rotas gerenciador
Route::get('/gerenciador', ['as' => 'manager', 'uses' => 'ManagerController@index']);

#Rotas perfil
Route::get('/perfil/{id}', ['as' => 'profile', 'uses' => 'UserController@index']);
Route::post('/perfil/{id}', ['as' => 'profile.update', 'uses' => 'UserController@update']);

#rotas de Login
Route::get('usuario/redirect-google', ['as' => 'social.google.redirect', 'uses' => 'AuthController@googleRedirect']);
Route::get('usuario/cadastro-google', ['as' => 'social.google.register', 'uses' => 'AuthController@googleReturn']);

Route::get('usuario/redirect-facebook', ['as' => 'social.facebook.redirect', 'uses' => 'AuthController@facebookRedirect']);
Route::get('usuario/cadastro-facebook', ['as' => 'social.facebook.register', 'uses' => 'AuthController@facebookReturn']);

Route::get('usuario/cadastrar', ['as' => 'user.register', 'uses' => 'UserController@register']);
Route::post('usuario/cadastro', ['as' => 'register', 'uses' => 'Auth\RegisterController@create']);
Route::post('/', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

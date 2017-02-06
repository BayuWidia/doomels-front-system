<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// ================================== FRONT END ==========================================================
Route::get('/', ['as' => 'index', 'uses' => 'WelcomePageController@index']);
// Route::get('/listBerita', ['as' => 'listBerita', 'uses' => 'WelcomePageController@listBerita']);
// Route::get('/detailBerita', ['as' => 'detailBerita', 'uses' => 'WelcomePageController@detailBerita']);

Route::get('listberita/show/{id}', 'ListBeritaController@show');
Route::get('detailberita/show/{id}/{id_berita}', 'DetailBeritaController@show');

// ================================== FRONT END ==========================================================
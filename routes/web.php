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

Route::resource('users', 'UserController');

Route::get('inscription/{inscription_slug}', 'UserInscriptionController@index');
Route::get('inscription/subscribe/{taller}', 'UserInscriptionController@subscribe')->name('subscribe');

Route::get('inscriptions/{inscription}/toggle', 'InscriptionController@toggleInscription')->name('inscriptions.toggle');
Route::resource('inscriptions', 'InscriptionController');

Route::resource('tallers', 'TallerController');





Route::get('dashboard', function(){
   return view('dashboard');
});
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::post('drop-image', 'ElencoController@dropImage')->name('drop.image');
Route::post('drop-video', 'ElencoController@dropVideo')->name('drop.video');

Route::get('elencos_inscripcion', 'ElencoController@formShow')->name('elencos.inscripcion');
Route::post('elencos_inscripcion', 'ElencoController@formRegister')->name('elencos.inscripcion.register');
Route::get('elencos_inscripcion_success', function (){
    return view('elencos.success');
})->name('elencos.inscripcion.finish');
Route::get('elencos_inscripcion/show', 'ElencoController@formView')->name('elencos.inscripcion.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::get('inscription/{inscription_slug}', 'UserInscriptionController@index')->name('user.inscriptions');;
Route::get('inscription/subscribe/{taller}', 'UserInscriptionController@subscribe')->name('user.inscriptions.subscribe');
Route::get('inscription/destroy/{taller}', 'UserInscriptionController@destroy')->name('user.inscriptions.destroy');

Route::get('inscriptions/{inscription}/toggle', 'InscriptionController@toggleInscription')->name('inscriptions.toggle');
Route::resource('inscriptions', 'InscriptionController');

Route::resource('tallers', 'TallerController');

Route::get('elencos/edition', 'ElencoController@edition')->name('elencos.edition.show');
Route::post('elencos/edition', 'ElencoController@editionStore')->name('elencos.edition.store');
Route::resource('elencos', 'ElencoController');

Route::get('dashboard', function(){
   return view('dashboard');
});


Route::resource('results', 'ResultController');
Route::get('results/download/{taller}', 'ResultController@download')->name('results.download');




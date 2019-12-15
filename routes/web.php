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

Route::get('/send', 'MailController@index');

Route::prefix('recipient')->group(function () {
	Route::redirect('/', '/recipient/list');
    Route::get('/list', 'RecipientsСontroller@index');
    Route::get('/add', 'RecipientsСontroller@add');
    Route::get('/{id}/edit', 'RecipientsСontroller@edit');
    Route::post('/filter', 'RecipientsСontroller@filter');
});

Route::prefix('group')->group(function() {
	Route::redirect('/', '/group/list');
    Route::get('/list', 'GroupController@index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

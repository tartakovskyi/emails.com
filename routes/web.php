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

Route::get('phpinfo', function(){
	phpinfo();
});

Route::get('/send', 'MailController@index');

Route::prefix('recipient')->group(function () {
    Route::get('/', 'RecipientsСontroller@indexAction');
    Route::get('/{id}/edit/', 'RecipientsСontroller@editAction');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

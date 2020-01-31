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

Auth::routes();




Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::redirect('/', '/home');

    Route::prefix('recipient')->group(function () {
        Route::redirect('/', '/recipient/list');
        Route::get('/list', 'RecipientsController@index');
        Route::get('/edit/{id?}', 'RecipientsController@edit');
        Route::post('/filter', 'RecipientsController@filter');
    });

    Route::prefix('group')->group(function() {
        Route::redirect('/', '/group/list');
        Route::get('/list', 'GroupController@index');
        Route::get('/edit/{id?}', 'GroupController@edit');
        Route::post('/filter', 'GroupController@filter');
    });

    Route::prefix('campaign')->group(function() {
        Route::redirect('/', '/campaign/list');
        Route::get('/list', 'CampaignController@index');
        Route::get('/edit/{id?}', 'CampaignController@edit')->name('campaign');;
        Route::post('/filter', 'CampaignController@filter');
        Route::get('/send/{id}', 'CampaignController@send');
    });

    Route::prefix('user')->group(function() {
        Route::redirect('/', '/user/list');
        Route::get('/list', 'UserController@index');
        Route::get('/edit/{id?}', 'UserController@edit');
        Route::post('/filter', 'UserController@filter');
    });

    Route::get('/send/{id}', 'MailController@index');
});




/*Route::get('/test', function () {
    dd(App\Recipient::with('group')->get());
});*/

Route::get('/test', 'RecipientsController@test');

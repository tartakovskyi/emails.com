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

    Route::get('/', 'HomeController@index')->name('home');

    Route::prefix('recipient')->group(function () {
        Route::redirect('/', '/recipient/list');
        Route::get('/list', 'RecipientsСontroller@index');
        Route::get('/edit/{id?}', 'RecipientsСontroller@edit');
        Route::post('/filter', 'RecipientsСontroller@filter');
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

    Route::get('/send/{id}', 'MailController@index');
});




Route::get('/test', function () {
    $files = File::allFiles(resource_path('views/emails'));
    $views = [];

    foreach ($files as $file) {
        $fileName = pathinfo($file)['filename'];
        $viewName = str_replace('.blade','',$fileName);
        $views[] = $viewName;
    }
});

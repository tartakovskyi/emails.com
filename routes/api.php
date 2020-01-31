<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});


Route::prefix('recipient')->group(function () {
	Route::post('/save/{id?}', 'API\RecipientController@save');
	Route::post('/delete/{id}', 'API\RecipientController@delete');
});

Route::prefix('group')->group(function () {
	Route::post('/save/{id?}', 'API\GroupController@save');
	Route::post('/delete/{id}', 'API\GroupController@delete');
});

Route::prefix('user')->group(function () {
	Route::post('/save/{id?}', 'API\UserController@save');
	Route::post('/delete/{id}', 'API\UserController@delete');
});

Route::prefix('campaign')->group(function () {
	Route::post('/save/{id?}', 'API\CampaignController@save');
	Route::post('/delete/{id}', 'API\CampaignController@delete');
	Route::put('/recipients/{id}', 'API\CampaignController@addRecipients');
	Route::delete('/recipients/{id}', 'API\CampaignController@removeRecipients');
});
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
Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/', 'TodoController@getHome')->name('home');
	
	Route::get('/form', function () {
    return view ('form');
	})->name('form');

	Route::post('/', 'TodoController@postStore');
//===============Edit========================
	Route::get('/{id}/edit', [
		'uses'=>'TodoController@getEdit',
		'as'=>'getEdit'
		]);

//==================Update===================
	Route::post('/{id}/edit', [
		'uses'=>'TodoController@postUpdate',
		'as'=>'postUpdate'
		]);

//==================Delete==========================

	Route::post('/{id}/delete', [
		'uses'=>'TodoController@postDestroy',
		'as'=>'deleteTask'
		]);
});
Route::auth();



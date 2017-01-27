<?php
use Illuminate\Support\Facades\Input;

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

//==================Profil===============
 Route::get('/new', 'RoleController@getForm');
 Route::post('/new', 'RoleController@postStore');
 Route::get('/profil', 'RoleController@getHome');
 //===============Edit Profil========================
Route::get('/{id}/edit', [
	'uses'=>'RoleController@getEdit',
	'as'=>'editProfil'
	]);
//==================Update===================
Route::post('/{id}/edit', [
	'uses'=>'RoleController@postUpdate',
	'as'=>'postUpdate'
	]);
//==================All users===================
Route::get('/users', [
	'uses'=>'UserController@getHome'
	]);

Route::get('user', function () {
    return App\User::paginate();
});

Route::get('/test', function () {
	$categories = App\User::all();
    return view('user.test')->with('categories', $categories);
});

Route::get('/ajax-sub', function(){
	$cat_id = Input::get('id');
	$subcategories = DB::select('select * from users where id ='.$cat_id );
	return Response::json($subcategories);

});





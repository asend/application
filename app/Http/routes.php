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
    
    Route::get('/', 'RegionController@getHome')->name('home');
	
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
//Route::auth();
// Authentication Routes...
$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->get('logout', 'Auth\AuthController@logout');

// Registration Routes...
//$this->get('register', 'Auth\AuthController@showRegistrationForm');
$this->get('register', function() {
	$regions = App\Localite::all()->where('type',"Region");
	$profils = App\Role::all();
    //return view('auth.register')->with('regions', $regions);
    return view('auth.register',array('regions' => $regions, 'profils' => $profils));//->with('regions', $regions);
});
$this->post('register', 'Auth\AuthController@register');

// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');

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

Route::get('/ajax-sub', function(){
	$cat_id = Input::get('id');
	$subcategories = DB::select('select * from users where id ='.$cat_id );
	return Response::json($subcategories);

});

Route::get('/ajax-region-departement', function(){
	$region_id = Input::get('id');
	$departements = DB::select('select * from localites where parent_id ='.$region_id );
	return Response::json($departements);

});
Route::get('/ajax-departement-commune', function(){
	$dpt_id = Input::get('id');
	$communes = DB::select('select * from localites where parent_id ='.$dpt_id );
	return Response::json($communes);

});

Route::get('/localite', 'LocaliteController@getForm');
Route::post('/postLocalite', 'LocaliteController@postForm');

Route::get('/membres', [
	'uses'=>'UserController@getHomes'
	]);

/**
*	API
*/

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'V1', 'prefix' => 'api/v1'], function () {

        /*Route::get('/users', function (Request $request) {
             return response()->json(App\User::all());
        });*/
        Route::get('/users', function (Request $request) {
             return App\User::select('firstname','lastname','phone')->get();
        });

    });
});









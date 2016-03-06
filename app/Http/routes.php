<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/',[
	'as' 	=> 'welcome',
	'uses' 	=> 'WelcomeController@index']);

/*E-mail*/


Route::group(['prefix' => 'admin','middleware' => 'web'],function(){


	/* RUtas para los usuarios*/
	Route::get('/users',[
		'as'	=>	'admin.users.index',
		'uses'	=>	'UsersController@index',
		'middleware'	=> 'auth'
	]);
	Route::get('/users/create',[
		'as'	=>	'admin.users.create',
		'uses'	=>	'UsersController@create'
	]);
	Route::post('/users',[
		'as'	=>	'admin.users.store',
		'uses'	=>	'UsersController@store'
	]);
	Route::get('/users/{id}/edit',[
		'as'	=>	'admin.users.edit',
		'uses'	=>	'UsersController@edit'
	]);

	Route::put('/users/{id}',[
		'as'	=>	'admin.users.update',
		'uses'	=> 	'UsersController@update'
	]);

	Route::get('/users/{id}',[
		'as'	=>	'admin.users.destroy',
		'uses'	=> 	'UsersController@destroy'
	]);

	/*Rutas para los subscriptores

	Route::get('/subscribers',[
		'as'	=>	'admin.subscribers.index',
		'uses'	=>	'SubscribersController@index',
		'middleware'	=> 'auth'
	]);
	Route::get('/subscribers/create',[
		'as'	=>	'admin.subscribers.create',
		'uses'	=>	'SubscribersController@create'
	]);
	Route::post('/subscribers',[
		'as'	=>	'admin.subscribers.store',
		'uses'	=>	'SubscribersController@store'
	]);
	Route::get('/subscribers/{id}/edit',[
		'as'	=>	'admin.subscribers.edit',
		'uses'	=>	'SubscribersController@edit'
	]);

	Route::put('/subscribers/{id}',[
		'as'	=>	'admin.subscribers.update',
		'uses'	=> 	'SubscribersController@update'
	]);

	Route::get('/subscribers/{id}',[
		'as'	=>	'admin.subscribers.destroy',
		'uses'	=> 	'SubscribersController@destroy'
	]);*/

	/* RUtas para servicios*/

	Route::get('/services',[
		'as'	=>	'admin.services.index',
		'uses'	=>	'ServicesController@index',
		'middleware'	=> 'auth'
	]);
	Route::get('/services/create',[
		'as'	=>	'admin.services.create',
		'uses'	=>	'ServicesController@create'
	]);
	Route::post('/services',[
		'as'	=>	'admin.services.store',
		'uses'	=>	'ServicesController@store'
	]);
	Route::get('/services/{id}/edit',[
		'as'	=>	'admin.services.edit',
		'uses'	=>	'ServicesController@edit'
	]);

	Route::put('/services/{id}',[
		'as'	=>	'admin.services.update',
		'uses'	=> 	'ServicesController@update'
	]);

	Route::get('/services/{id}',[
		'as'	=>	'admin.services.destroy',
		'uses'	=> 	'ServicesController@destroy'
	]);

	Route::get('/services/{id}/join',[
		'as'	=>	'admin.services.join',
		'uses'	=>	'ServicesController@join'
	]);

	/*Ruta spara los incidents*/

	Route::get('/incidents',[
		'as'	=>	'admin.incidents.index',
		'uses'	=>	'IncidentsController@index',
		'middleware'	=> 'auth'
	]);
	Route::get('/incidents/{id}/create',[
		'as'	=>	'admin.incidents.create',
		'uses'	=>	'IncidentsController@create'
	]);
	Route::post('/incidents',[
		'as'	=>	'admin.incidents.store',
		'uses'	=>	'IncidentsController@store'
	]);
	Route::get('/incidents/{id}/edit',[
		'as'	=>	'admin.incidents.edit',
		'uses'	=>	'IncidentsController@edit'
	]);

	Route::put('/incidents/{id}',[
		'as'	=>	'admin.incidents.update',
		'uses'	=> 	'IncidentsController@update'
	]);

	Route::get('/incidents/{id}',[
		'as'	=>	'admin.incidents.destroy',
		'uses'	=> 	'IncidentsController@destroy'
	]);
	Route::get('/incidents/{id}/show',[
		'as'	=>	'admin.incidents.show',
		'uses'	=>	'IncidentsController@show'
	]);
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/*


/*Rutas para la autenticacion*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});

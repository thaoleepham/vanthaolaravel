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
Route::get('index',[
	'as'=>'trang-chu',
	'uses'=>'UserController@getIndex'
]);
//user
Route::get('login',[
	'as'=>'user-login',
	'uses'=>'UserController@getLogin'
]);
Route::post('login',[
	'as'=>'user-login',
	'uses'=>'UserController@postLogin'
]);

Route::get('register',[
	'as'=>'user-register',
	'uses'=>'UserController@getRegister'
]);
Route::post('register',[
	'as'=>'user-register',
	'uses'=>'UserController@postRegister'
]);

Route::group(['prefix'=>'quanlyuser','middleware'=>'adminLogin'],function(){

	Route::get('listuser',[
		'as'=>'list-user',
		'uses'=>'UserController@getListUser'
	]);

	Route::get('addUser',[
	'as'=>'admin-addUser',
	'uses'=>'UserController@getAddUser'
	]);
	Route::post('addUser',[
		'as'=>'admin-addUser',
		'uses'=>'UserController@postAddUser'
	]);

	Route::get('edit_user/{id}',[
		'as'=>'admin-editUser',
		'uses'=>'UserController@getEditUser'
		]);
	Route::post('edit_user/{id}',[
		'as'=>'admin-editUser',
		'uses'=>'UserController@postEditUser'
		]);
	Route::get('delete_user/{id}',[
		'as'=>'admin-deleteUser',
		'uses'=>'UserController@getDeleteUser'
		]);
	Route::get('logout',[
		'as'=>'logout',
		'uses'=>'UserController@getLogout'
		]);
	});

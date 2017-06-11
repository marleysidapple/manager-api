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

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	$api->group(['namespace' => 'App\Http\Controllers\Api\V1'], function($api){ //start of group

		/*
		* register route
		* POST
		*/
	 	$api->post('auth/register', 'SignupController@create');


	 	/*
	 	* login route
	 	* POST
	 	*/
	 	$api->post('auth/login', 'SignupController@authenticate');


	 	/**
	 	* get route
	 	* get all post
	 	* @param int $id optional
	 	*/
	 	$api->get('posts', 'PostController@index');


	 	/**
	 	* get route
	 	* get post by id
	 	* @param int $id optional
	 	*/
	 	$api->get('posts/{id}', 'PostController@findPostById');


	 	/**
	 	* post route
	 	* save all posts
	 	*/
	 	$api->post('post/store', 'PostController@store');

	 	/**
	 	* @param int $id
	 	* delete post
	 	*/
	 	$api->get('post/destroy/{id}', 'PostController@destroy'); 

	 	/**
	 	* @param string $token
	 	* get user details
	 	*/
	 	$api->get('auth/user/{token?}', 'SignupController@userDetail');

	 	/**
	 	* @param int id
	 	* @param Request Array
	 	*/
	 	$api->post('post/update/{id}', 'PostController@updatePost');

	 	/**
	 	* list employee
	 	*
	 	*/
	 	$api->get('employee/list', 'EmployeeController@listEmployee');


	 	/**
	 	* add employee
	 	*
	 	*/
	 	$api->post('employee/add', 'EmployeeController@addEmployee');


	 }); //end of group
});
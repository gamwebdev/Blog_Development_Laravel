<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::group(['middleware' => ['web']],function(){
	// Authentication Routes

	Auth::routes();

	Route::get('/home', 'HomeController@index');
/*
	Route::get('auth/login' , 'Auth\LoginController@login');
	Route::get('auth/login' , 'Auth\LoginController@sendLoginResponse');
	Route::get('auth/logout' , 'Auth\LoginController@logout');

	//Registratin Routes
	Route::get('auth/register' , 'Auth\RegisterController@register');
*/

	//comment
	Route::post('comment/{post_id}' , [ 'uses' => 'CommentsController@store' , 'as' => 'comments.store' ]);

	//slug 
	Route::get('blog/{slug}' , ['uses' => 'BlogController@getSingle' , 'as' => 'blog.single'])->where('slug' , '[\w\d/-\_]+');

	Route::get('/contact', 'PagesController@getContact');

	Route::get('/about', 'PagesController@getAbout');

	Route::get('/', 'PagesController@getIndex');

	Route::resource('/posts', 'PostController');

	// eq.= route::get('posts.create' , 'PostController@createposts');
});


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
Route::auth();

//Wall
Route::get('/', 'WallController@index');

//Post
Route::post('post/{id}/like', 'PostController@like');
Route::resource('post', 'PostController');

Route::group(['middleware' => ['auth']], function () {
    //Profile
    Route::get('profile', function() {
        return view('user.index', ['user' => Auth::user()]);
    });
    Route::get('profile/{name}', 'UserController@getUserByName');
});

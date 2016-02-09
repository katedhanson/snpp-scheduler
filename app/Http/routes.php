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

// authenticated routes
Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');

    // all the pages pertaining to shifts
    Route::get('schedule', 'ShiftsController@index');
    Route::get('shift/create', 'ShiftsController@create');
    Route::get('shift/edit/{id}', 'ShiftsController@edit');
    Route::get('timecard', 'ShiftsController@timecard');
    Route::post('shifts', 'ShiftsController@store');

    // all the pages pertaining to users
    Route::get('directory', 'UsersController@index');
    Route::get('contact/{id}', 'UsersController@show');
    Route::get('user/create', 'UsersController@create');
    Route::post('users', 'UsersController@store');

});

// non-authenicated routes
Route::group(['middleware' => ['web']], function () {
  Route::get('/', function(){ return view('home'); });

  // for now, no one can register new users
  Route::get('/register', function(){ return view('home'); });

  // send any bad urls to the default error page
  Route::get('/{url}', 'ErrorController@index');
  Route::get('schedule/{url}', 'ErrorController@index');
  Route::get('shift/create/{url}', 'ErrorController@index');
  Route::get('directory/{url}', 'ErrorController@index');
  Route::get('user/create/{url}', 'ErrorController@index');
});

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

/* Homepage */
Route::get('/', function () {
  if(Auth::check())
  {
    return Redirect::route('today');
  }
  return view('home/homepage');
});

/* Auth */
Route::controller('auth', 'Auth\AuthController');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@Logout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/* Project & tasks */
Route::model('tasks', 'Task');
Route::model('projects', 'Project');

Route::bind('tasks', function($value, $route) {
  return App\Task::whereSlug($value)->first();
});

Route::bind('projects', function($value, $route) {
  return App\Project::whereSlug($value)->first();
});

Route::resource('projects', 'ProjectsController');
Route::resource('projects.tasks', 'TasksController');

Route::get('today', ['as' => 'today', 'uses' => 'TasksController@today']);

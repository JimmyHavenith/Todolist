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
Route::model('tags', 'Tag');

Route::bind('tasks', function($value, $route) {
  return App\Task::whereSlug($value)->first();
});

Route::bind('projects', function($value, $route) {
  return App\Project::whereSlug($value)->first();
});

Route::bind('tags', function($value, $route) {
  return App\Tag::whereSlug($value)->first();
});

Route::resource('projects', 'ProjectsController');
Route::resource('projects.tasks', 'TasksController');

Route::resource('tags', 'TagsController');
Route::resource('tags.tasks', 'TasksController');

Route::get('tasks/delete/{id}/{ajax?}', ['as' => 'deleteTask', 'uses' => 'TasksController@destroy']);


Route::get('today', ['as' => 'today', 'uses' => 'TasksController@today']);
Route::get('tomorrow', ['as' => 'tomorrow', 'uses' => 'TasksController@tomorrow']);

Route::post('check', ['as' => 'check', 'uses' => 'TasksController@check']);

// Theme color

Route::get('projects/checkSingle/{id}', ['as' => 'checkSingle', 'uses' => 'TasksController@checkSingle']); //ajax
Route::get('projects/uncheckSingle/{id}', ['as' => 'uncheckSingle', 'uses' => 'TasksController@uncheckSingle']); //ajax
Route::get('projects/tasksName/{id}', ['as' => 'tasksName', 'uses' => 'TasksController@tasksName']); // ajax
Route::get('projects/projectsName/{id}', ['as' => 'projectsName', 'uses' => 'ProjectsController@projectsName']); // ajax
Route::get('projects/descriptionName/{id}', ['as' => 'descriptionName', 'uses' => 'TasksController@descriptionName']); // ajax
Route::get('projects/dateName/{id}', ['as' => 'dateName', 'uses' => 'TasksController@dateName']); // ajax


Route::resource('settings', 'SettingsController');
Route::get( 'updateColor/{number}', [ 'as' => 'updateColor', 'uses' => 'SettingsController@updateColor', 'middleware' => 'auth' ] );

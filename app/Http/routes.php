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

Route::get('/', [
    'uses' => '\Prego\Http\Controllers\HomeController@index',
    'as'   => 'index'
]);

/**
 *  Authentication routes
 */
Route::get('/auth/register', [
    'uses' => '\Prego\Http\Controllers\AuthController@getRegister',
    'as'   => 'auth.register',
    'middleware' => ['guest']
]);

Route::post('/auth/register', [
    'uses' => '\Prego\Http\Controllers\AuthController@postRegister',
    'middleware' => ['guest']
]);

Route::get('/auth/signin', [
    'uses' => '\Prego\Http\Controllers\AuthController@getLogin',
    'as'   => 'auth.login',
    'middleware' => ['guest']
]);

Route::post('/auth/signin', [
    'uses' => '\Prego\Http\Controllers\AuthController@postLogIn',
    'middleware' => ['guest']
]);

Route::get('/logout', [
    'uses' => '\Prego\Http\Controllers\AuthController@logOut',
    'as'   => 'auth.logout'
]);

Route::resource('projects', 'ProjectController');

# Comment routes
Route::post('projects/{projects}/comments', [
    'uses' => 'ProjectCommentsController@postNewComment',
    'as'   => 'projects.comments.create',
    'middleware' => ['auth']
]);

Route::get('projects/{projects}/comments/{comments}/edit', [
    'uses' => 'ProjectCommentsController@getOneProjectComment',
    'as' => 'projects.comments'
]);

Route::put('projects/{projects}/comments/{comments}', [
    'uses' => 'ProjectCommentsController@updateOneProjectComment',
]);

Route::delete('projects/{projects}/comments/{comments}', [
    'uses' => 'ProjectCommentsController@deleteOneProjectComment',
]);

# Collaborator routes
Route::post('projects/{projects}/collaborators', [
    'uses' => 'ProjectCollaboratorsController@addCollaborator',
    'as'   => 'projects.collaborators.create',
    'middleware' => ['auth']
]);

Route::delete('projects/{projects}/collaborators/{collaborators}', [
    'uses' => 'ProjectCollaboratorsController@deleteOneCollaborator',
]);

# Task routes
Route::post('projects/{projects}/tasks', [
    'uses' => '\Prego\Http\Controllers\ProjectTasksController@postNewTask',
    'as' => 'projects.tasks.create'
]);

Route::get('projects/{projects}/tasks/{tasks}/edit', [
    'uses' => '\Prego\Http\Controllers\ProjectTasksController@getOneProjectTask',
    'as' => 'projects.tasks'
]);

Route::put('projects/{projects}/tasks/{tasks}', [
    'uses' => '\Prego\Http\Controllers\ProjectTasksController@updateOneProjectTask',
]);

Route::delete('projects/{projects}/tasks/{tasks}', [
    'uses' => '\Prego\Http\Controllers\ProjectTasksController@deleteOneProjectTask',
]);

Route::post('projects/{projects}/files', [
     'uses' => '\Prego\Http\Controllers\FilesController@uploadAttachments',
     'as'   => 'projects.files',
     'middleware' => ['auth']
]);






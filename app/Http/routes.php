<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

use App\Task;
use Illuminate\Http\Request;

/**
 * Home - Welcome page
 */
Route::get('/', 'AppController@displayWelcomePage');

/**
 * Homepage for the users
 */
Route::get('/home', 'TaskController@display');

/**
 * Add a new task
 */
Route::post('/task', 'TaskController@process');

/**
 * Update a task's state
 */
Route::put('/task', 'TaskController@updateState');

/**
 * Form to update a task
 */
Route::get('task/update/{task}', 'TaskController@displayOne');

/**
 * Update a task
 */
Route::put('task/update', 'TaskController@update');

/**
 * Delete an existing task
 */
Route::delete('/task/{task}', 'TaskController@delete');

Route::auth();

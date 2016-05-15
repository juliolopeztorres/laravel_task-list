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
 * Home - Show task dashboard
 */
Route::get('/', 'TaskController@display');

/**
 * Add a new task
 */
Route::post('/task', 'TaskController@process');

/**
 * Delete an existing task
 */
Route::delete('/task/{task}', 'TaskController@delete');

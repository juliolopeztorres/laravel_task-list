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
Route::get('/', function () {
  return view("tasks");
});

/**
 * Add a new task
 */
Route::post('/task', function (Request $request) {

});

/**
 * Delete an existing task
 */
Route::delete('/task/{task}', function (Task $task) {

});

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Task;

class TaskController extends Controller
{
    /**
     * Function to process a new posted task and add it to
     * tasks table
     * @param  Request $request The request input data
     * @return Redirects to '/' with or without errors.
     */
    public function process(Request $request)
    {
      $validator = Validator::make($request->all(), [
        "name" => "required|max:255"
      ]);

      if ($validator->fails()) {
        return redirect('/')
                ->withInput()
                ->withErrors($validator);
      }

      // Create a task
      $task = new Task();
      $task->name = $request->name;
      $task->save();

      return redirect('/');

    }

    /**
     * Function to retreive all tasks stored in table tasks
     * and pass it to the view
     * @return View tasks blade view
     */
    public function display()
    {
      $tasks = Task::orderBy('created_at', 'asc')->get();

      return view('tasks', [
        'tasks' => $tasks
      ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Task;

class TaskController extends Controller
{
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
}

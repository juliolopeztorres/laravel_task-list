<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Task;
use App\State;

class TaskController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Function to process a new posted task and add it to
     * tasks table
     * @param  Request $request The request input data
     * @return Redirects to '/home' with or without errors.
     */
    public function process(Request $request)
    {
      $validator = Validator::make($request->all(), [
        "name" => "required|max:255"
      ]);

      if ($validator->fails()) {
        return redirect('/home')
                ->withInput()
                ->withErrors($validator);
      }

      // Create a task
      $task = new Task();
      $task->name = $request->name;
      $task->save();

      return redirect('/home');

    }

    /**
     * Function to retreive all tasks stored in table tasks
     * and pass it to the view
     * @return View tasks blade view
     */
    public function display()
    {
      $tasks = Task::orderBy('state_id', 'desc')->orderBy('created_at', 'asc')->get();

      // Retrieve all possible states
      $states = State::all();

      return view('tasks', [
        'tasks' => $tasks,
        'states' => $states
      ]);
    }

    /**
     * Function to show the detailed info of a task
     * @param  Task   $task The task user clicked
     * @return View task blade view
     */
    public function displayOne(Task $task)
    {
      return view('task', ['task' => $task]);
    }

    /**
     * Function to delete de task passed through argument.
     * Redirects to the dashboard
     * @param  Task   $task Task to delete
     * @return Redirects to dashboard
     */
    public function delete(Task $task)
    {
      $task->delete();

      return redirect('/home');
    }

    /**
     * Function to update a Task's state
     * @param  Request $request The request object with data PUT
     * @return Redirects to dashboard
     */
    public function updateState(Request $request)
    {
      $validator = Validator::make($request->all(), [
        "state_id" => "required"
      ]);

      if ($validator->fails()) {
        return redirect('/home')
                ->withInput()
                ->withErrors($validator);
      }

      // Update task's state
      $task = Task::find($request->task_id);
      // If user put the same state, throw an error
      if ($request->state_id == $task->state_id) {
        return redirect('/home')->withInput()->withErrors(['The state must be different than the actual.']);
      }

      $task->state_id = $request->state_id;
      $task->save();

      return redirect('/home');
    }

    /**
     * Function to update the basic information of a task
     * @param  Request $request The request object with data PUT
     * @return Redirects to dashboard
     */
    public function update(Request $request)
    {
      $validator = Validator::make($request->all(), [
        "name" => "required",
        "created_at" => "required|date_format:Y-m-d H:i:s",
      ]);

      if ($validator->fails()) {
        return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
      }

      $task = Task::find($request->id);
      $task->name = $request->name;
      $task->description = $request->description;
      $task->created_at = $request->created_at;
      $task->save();

      return redirect('/home');
    }
}

@extends('layouts.app')

@section('content')

  <div class="panel-body">
    <!-- Display errors -->
    @include('common.errors')

    <form action="{{url('task')}}" class="form-horizontal" method="post">
      {!! csrf_field() !!}
      <!-- Task Name -->
      <div class="form-group">
        <label for="task" class="col-sm-3 control-label">
          Task
        </label>

        <div class="col-sm-6">
          <input type="text" name="name" id="task-name" class="form-control" value="">
        </div>
      </div>

      <!-- Add Task button -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
          <button type="submit" class="btn btn-default">
            <i class="fa fa-plus"></i>
            Add Task
          </button>
        </div>
      </div>
    </form>
  </div>

  @if(count($tasks) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        Current Tasks
      </div>
    </div>
    <div class="panel-body">
      <table class="table table-striped task-table">
        <!-- HEAD -->
        <thead>
          <th class="text-center">
            Task
          </th>
          <th colspan="3">
            <i>Change the status of your tasks, delete those done, etc ...</i>
          </th>
        </thead>
        <tbody>
          @foreach ($tasks AS $task)
            <tr>
              <!-- Display Task Name -->
              <td class="table-text">
                {{ $task->name }}
              </td>
              <td>
                <!-->TODO: Current Status</!-->
              </td>
              <td>
                <!-->TODO: DELETE Button</!-->
              </td>
              <td>
                <!-->TODO: CHANGE State Button</!-->
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
@endsection

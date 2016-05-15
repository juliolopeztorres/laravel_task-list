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
          <input type="text" name="name" id="task-name" class="form-control" value="{{ old('name') }}">
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
          <th>
            Created
          </th>
          <th colspan="3">
            <i>Change the status of your tasks, delete those which are done, etc ...</i>
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
                {{ date('d/m/Y', strtotime($task->created_at)) }}
              </td>
              <td class="util-pointer" title="{{ $task->state->description }}">
                <i class="{{ $task->state->icon }}"></i>
                &nbsp;
                {{ $task->state->name }}
              </td>
              <td>
                <form action="{{ url('task') }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                  <select class="" name="state_id">
                    @if(count($states) > 0)
                        <option value="">Select one option</option>
                      @foreach ($states AS $state)
                        <option value="{{ $state->id }}" title="{{ $state->description }}">{{ $state->name }}</option>
                      @endforeach
                    @else
                        <option value="">There is any state yet :(</option>
                    @endif
                  </select>
                  <input type="hidden" name="task_id" value="{{ $task->id }}">
                  <button type="submit" class="btn btn-info">
                    <i class="fa fa-exchange"></i>
                    Change
                  </button>
                </form>
              </td>
              <td>
                <form action="{{ url('task/' . $task->id) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
@endsection

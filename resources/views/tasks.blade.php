@extends('layouts.app')

@section('content')

<div class="panel-body">
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
<!-- TODO: Current Tasks -->
@endsection

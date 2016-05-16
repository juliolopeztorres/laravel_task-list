@extends('layouts.app')

@section('content')

  <div class="panel-body">
    <!-- Display errors -->
    @include('common.errors')

    <h1>Details of Task called {{ $task->name }}</h1>

    <form action="{{url('task/update')}}" class="form-horizontal" method="post">
      {!! csrf_field() !!}
      {{ method_field('PUT') }}
      <fieldset class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="task_name" placeholder="Enter a name"
          value="@if(old('name')){{ old('name')}}@else{{$task->name}}@endif">
      </fieldset>

      <fieldset class="form-group">
        <label for="state">State</label>
        <p>
          {{ $task->state->name }} ({{ $task->state->description }})
        </p>
        <small class="text-muted">Go to the dashboard in order to update the task {{ $task->name }}</small>
      </fieldset>

      <fieldset class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="8" cols="40"
          class="form-control util-resize-none"
          placeholder="Enter a short description of the task">@if(old('description')){{old('description')}}@else{{$task->description}}@endif</textarea>
      </fieldset>

      <fieldset class="form-group">
        <label for="created_at">Created at</label>
        <input type="date" class="form-control" name="created_at" id="task_created_at"
          placeholder="Enter a date (yyyy/mm/dd H:i:s)"
          value="@if(old('created_at')){{old('created_at')}}@else{{$task->created_at}}@endif">
      </fieldset>

      <input type="hidden" name="id" value="{{ $task->id }}">
      <button type="submit" class="btn btn-primary">Update task</button>
      <button class="btn btn-danger" onclick="window.history.back();return false;">Back</button>
    </form>

  </div>

@endsection

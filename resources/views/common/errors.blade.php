<!-- resources/views/common/errors.blade.php -->

@if(count($errors) > 0)
  <!-- Form Error list -->
  <div class="alert alert-danger">
    <strong>
      There are some errors in the app listed below:
    </strong>
    <br><br>
    <ul>
      @foreach ($errors->all() AS $error)
        <li>
          {{ $error }}
        </li>
      @endforeach
    </ul>
  </div>
@endif

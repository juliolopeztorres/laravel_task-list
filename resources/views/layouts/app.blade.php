<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simple Task Management - Laravel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href=" {{ asset('css/index.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <nav class="navbar navbar-default">
        <p class="navbar-text">
          <i class="fa fa-sticky-note-o"></i>
          My Task Manager
        </p>
      </nav>

      @yield("content")
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>

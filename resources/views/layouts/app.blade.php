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
        <p id="p_navbar_name" class="navbar-text util-pointer" onclick="window.location='{{ url('/') }}'">
          <i class="fa fa-sticky-note-o"></i>
          My Task Manager
        </p>

        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
            <li><a href="{{ url('/home') }}">Home</a></li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right util-padding-right-10">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            @endif
        </ul>
      </nav>

      @yield("content")
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  </body>
</html>

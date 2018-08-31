<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SMS') }} : TEACHER</title>

    <!-- Styles -->
    <!-- <link href="/css/app.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('bootstrap3.3.7/css/bootstrap.min.css')}}">
    @yield('styles')
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
           
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'SMS') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar --> 
                
                  
            <ul class="nav navbar-nav">                           
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">RESULTS
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">      
                        <li ><a href="{{route('results.create')}}">ADD RESULTS</a></li>
                        <li class="divider"></li>
                        <li ><a href="{{route('results.index')}}">VIEW RESULTS</a></li>                                                      
                    </ul>
                </li>        
                <li>
                    <a href="{{route('result_chart.index')}}">PERFORMANCE</a>
                </li>         
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">REPORT CARDS
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">      
                        <li ><a href="{{route('pdf')}}">PROCESS REPORT CARDS</a></li>
                        <li class="divider"></li>
                        <li ><a href="#">***</a></li>                                                      
                    </ul>
                </li> 
            </ul>  
                @if (Route::has('login'))  @endif
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/teacher/login') }}">Login</a></li>
                        <!-- <li><a href="{{ url('/teacher/register') }}">Register</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name}} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                            <li><a href="{{route('profile.index')}}"> <span class="gyphicon glyphicon-user"></span> Profile</a></li>

                                <li>
                                    <a href="{{ url('/teacher/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/teacher/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
<div class="container-fluid">

         @yield('create-nav')
 
        @yield('content')

</div>
   

    <!-- Scripts -->
    <!-- <script src="/js/app.js"></script> -->
            <!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="{{asset('js/jquery-3.3.1.min.js')}}"> </script>
<!-- Latest compiled JavaScript -->
<script src="{{asset('bootstrap3.3.7/js/bootstrap.min.js')}}"> </script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</body>
</html>

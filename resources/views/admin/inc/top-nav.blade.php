<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">SMS</a>
    </div>
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li> 
      <li><a href="#">Page 3</a></li>  -->
    </ul>
 
    <ul class="nav navbar-nav navbar-right">
    
    @auth
        <a href="{{ url('/home') }}">Home</a>
    @else
    <li class="dropdown">
        <a class="btn btn-default btn-outline-secondary dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span>  Login
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="{{ route('admin_login') }}">ADMIN</a></li>
          <li><a href="{{ route('teacher_login') }}">TEACHER</a></li>
          <li><a href="#">CLASS TEACHER</a></li>
        </ul>
      </li>
    <!-- <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
    @endauth
    </ul>   <!-- @if(Route::has('login')) -->
     <!-- @endif -->
  </div>
</nav>

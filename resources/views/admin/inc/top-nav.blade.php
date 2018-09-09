<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{url('/')}}">SMS</a>
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
    
    @endauth
    </ul>   <!-- @if(Route::has('login')) -->
     <!-- @endif -->
  </div>
</nav>

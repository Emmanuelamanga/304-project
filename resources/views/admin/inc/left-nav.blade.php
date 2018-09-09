@section('styles')
<style>
       a{
            list-style-type: none;
            text-decoration: none;
        }
   </style>
@endsection

<ul class="nav flex-column"> 
<!-- // compiled nav in an acordion -->
<img src="{{asset('storage/admin.png')}}" class="img-rounded" alt="Cinque Terre" width="200" height="100">
<li class="nav-item">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
          REMEMBER</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
          The admin is resposibility should be upheld.
        </div>
      </div>
    </div>
    <!-- teachers section -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
          TEACHERS</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
          <ul class="list-group">
            <li class="list-group-item"><a href="{{route('teachers.create')}}"><span class="glyphicon glyphicon-plus"></span>  ADD TEACHER</a></li>
            <li class="list-group-item"><a href="{{route('teachers.index')}}"> <span class="glyphicon glyphicon-eye-open"></span>  VIEW TEACHER</a></li>
            <!-- <li class="list-group-item">Three</li> -->
             <!-- <li class="list-group-item"><a href="{{route('teachers_subjects.index')}}"><span class="glyphicon glyphicon-plus"></span>  ASSIGN SUBJECT(s)</a></li> -->
          </ul>
        </div>
      </div>
    </div>
    <!-- STUDENTS -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
          STUDENTS</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
          <ul class="list-group">
              <li class="list-group-item"><a href="{{route('students.create')}}"><span class="glyphicon glyphicon-plus"></span>  ADD STUDENT</a></li>
              <li class="list-group-item"><a href="{{route('students.index')}}"><span class="glyphicon glyphicon-eye-open"></span>  VIEW STUDENT</a></li>
              <!-- <li class="list-group-item">Three</li> -->
            </ul>
        </div>
      </div>
    </div>
    <!-- parents -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
          PARENTS</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">
          <ul class="list-group">
              <li class="list-group-item"><a href="{{route('std_parents.create')}}"><span class="glyphicon glyphicon-plus"></span>  ADD PARENT</a></li>
              <li class="list-group-item"><a href="{{route('std_parents.index')}}"><span class="glyphicon glyphicon-eye-open"></span>  VIEW PARENT</a></li>
              <!-- <li class="list-group-item">Three</li> -->
            </ul>
        </div>
      </div>
    </div>
     <!-- rooms -->
     <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
          ROOMS</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
          <ul class="list-group">
              <a href="{{route('rooms.create')}}"><li class="list-group-item"><span class="glyphicon glyphicon-plus"></span> ADD ROOM</li></a>
              <li class="list-group-item"><a href="{{route('rooms.index')}}"><span class="glyphicon glyphicon-eye-open"></span>  VIEW ROOM</a></li>
              <!-- <li class="list-group-item">Three</li> -->
              <a href="{{route('teacherRoom.index')}}"><li class="list-group-item"><span class="glyphicon glyphicon-plus"></span> ADD TEACHER TO ROOM</li></a>
            </ul>
        </div>
      </div>
    </div>
  </div>
</li>
<!-- teacher -->
  <!-- <li class="nav-item clearfix"> 
    <div class="dropdown ">
      <button class="btn btn-default dropdown-toggle" 
      type="button" data-toggle="dropdown">TEACHERS
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="{{route('teachers.create')}}">ADD</a></li>
        <li><a href="{{route('teachers.index')}}">VIEW</a></li>
        <!-- <li><a href="{{route('subjects.index')}}">SUBJECT</a></li> 
        <li class="divider"></li>
        <!-- <li><a href="#">PERFORMANCE CURVE</a></li> 
        <li><a href="{{route('teachers_subjects.index')}}">TEACHERS SUBJECTS</a></li>
      </ul>
    </div>
  </li>
 <br>
 <!-- student 
  <li class="nav-item">
  <div class="dropdown ">
      <button class="btn btn-default dropdown-toggle" 
      type="button" data-toggle="dropdown">STUDENTS
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="{{route('students.create')}}">ADD</a></li>
        <li><a href="{{route('students.index')}}">VIEW</a></li>
        <li class="divider"></li>
        <li><a href="#">PERFORMANCE CURVE</a></li>
      </ul>
    </div>
  </li>
  <br>
  <!-- room 
  <li class="nav-item">
  <div class="dropdown ">
      <button class="btn btn-default dropdown-toggle" 
      type="button" data-toggle="dropdown">Room
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="{{route('rooms.create')}}">ADD</a></li>
        <li><a href="{{route('rooms.index')}}">VIEW</a></li>
        <li class="divider"></li>
          </ul>
    </div>
  </li> --
  
  <!-- teachers subjects
<li class="nav-item">
  <div class="dropdown ">
      <button class="btn btn-default dropdown-toggle" 
      type="button" data-toggle="dropdown">Subjects
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="#">ADD</a></li>
        <li><a href="#">VIEW</a></li>
        <li class="divider"></li>
        <li><a href="#">VIEW</a></li>
      </ul>
    </div>
  </li> --
    <!-- <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li> -->
</ul>
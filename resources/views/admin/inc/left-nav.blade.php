<ul class="nav flex-column">
  <li class="nav-item clearfix">
    <div class="dropdown ">
      <button class="btn btn-default dropdown-toggle" 
      type="button" data-toggle="dropdown">TEACHERS
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="{{route('teachers.create')}}">ADD</a></li>
        <li><a href="{{route('teachers.index')}}">VIEW</a></li>
        <!-- <li><a href="{{route('subjects.index')}}">SUBJECT</a></li> -->
        <li class="divider"></li>
        <!-- <li><a href="#">PERFORMANCE CURVE</a></li> -->
        <li><a href="{{route('teachers_subjects.index')}}">TEACHERS SUBJECTS</a></li>
      </ul>
    </div>
  </li>
 <br>
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
  </li>
  
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
  </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li> -->
</ul>
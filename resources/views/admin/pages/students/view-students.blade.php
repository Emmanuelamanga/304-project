@extends('admin.layout.auth')

@section('left-nav')

    @include('admin.inc.left-nav')
@endsection

@section('window')
@include('admin.inc.messages')
{{-- @if(count($students)>0)
<h1 class="text-center">STUDENTS RECORDS&nbsp;<span class="label label-primary"><span class="badge">{{count($students)}}</span></span></h1>
<hr>
   <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
    <div class="input-group mb-4 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-search" aria-hidden="true"></i></div>
        </div>
        <input type="text" class="form-control py-0" onkeyup="myFunction()" id="myInput" placeholder="Enter Adm no ...">
    </div>

<br>
<div class="panel panel-default">
  <div class="panel-body">
        <table id="myTable" class="table table-striped table-bordered table-sm table-hover" cellspacing="0" width="100%">
      {{-- <thead> 
        <tr>
          <th class="th-sm">#
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
          </th>
          <th class="th-sm">NAME
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
          </th>
          <th class="th-sm">ADM NO
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
          </th>
          <th class="th-sm">D.O.B
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
          </th>
          <th class="th-sm">FORM
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
          </th>
          <th class="th-sm">EMAIL
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
          </th> --}}
          <!-- <th class="th-sm">HOBBY
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
          </th> -->
          {{-- <th class="th-sm">D.O.R
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
          </th>
          <th class="th-sm">EDIT
          </th>
        </tr>
      </thead>
      <tbody>
        
          @foreach($students as $key =>  $student)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$student->name}}</td>
              <td>{{$student->adm_no}}</td>
              <td>{{$student->dob}}</td>
              <td>{{$room->get_room($student->room)->class_name}} <strong> ::<i>{{$subroom->get_subroom($student->subroom)->sub_class_name}}</i></strong></td>
              <td>{{$student->email}}</td>
              <td>{{$student->created_at}}</td>
              <td> <a href="students/{{$student->id}}/edit" class="btn btn-sm btn-info" > <i class='glyphicon glyphicon-edit'></i>  EDIT</a></td>
            </tr>
          @endforeach
          
      </tbody>
      <tfoot>
        <tr>
        <th>#</i>
          </th>
          <th>Name</i>
          </th>
          <th>ADM NO</i>
          </th>
          <th>D.O.B</i>
          </th>
          <th>FORM</i>
          </th>
          <th>EMAIL</i>
          </th>
          </th> --}}
          <!-- <th>HOBBY</i>
          </th> -->
          {{-- <th>D.O.R</i>
          </th>
          <th >EDIT
          </th>
        </tr>
      </tfoot>
    </table>
    @else
    <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>	
      <strong>No Student Records !</strong> 
    </div>

    @endif
  </div>
</div> --}}
{{-- check for rooms --}}
@if (count($rooms)>0)
<h1 class="text-center">STUDENTS RECORDS&nbsp;<span class="label label-primary"><span class="badge">{{count($students)}}</span></span></h1>
<hr>
   <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
    <div class="input-group mb-4 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-search" aria-hidden="true"></i></div>
        </div>
        <input type="text" class="form-control py-0" onkeyup="myFunction()" id="myInput" placeholder="Enter Adm no ...">
    </div>
<br>
<div class="panel panel-default">
  <div class="panel-body">
<table id="myTable" class="table table-striped table-bordered table-sm table-hover">
{{-- loop throgh rooms --}}
  @foreach ($rooms as $room)
  {{-- display room --}}
  <tr><th colspan="8" class="text-center">{{$room->class_name}}</th></tr>
       {{-- loop through subrooms --}}
     @foreach ($subrooms as $subroom)
         @if ($room->room_ref == $subroom->room_ref)
         {{-- display subroom --}}
         <tr><th colspan="8"  class="text-center">{{$subroom->sub_class_name}}</th></tr>
               <tr>
                <th class="th-sm">#
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th class="th-sm">NAME
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th class="th-sm">ADM NO
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th class="th-sm">D.O.B
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th class="th-sm">EMAIL
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th class="th-sm">D.O.R
                  <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                <th class="th-sm">EDIT
                </th>
              </tr>        
              {{-- loop through students --}}
              @foreach($students as $key =>  $student)
                @if ($student->subroom == $subroom->sub_room_ref)
                {{-- display the students in that room --}}
                   <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->adm_no}}</td>
                    <td>{{$student->dob}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->created_at}}</td>
                    <td> <a href="students/{{$student->id}}/edit" class="btn btn-sm btn-info" > <i class='glyphicon glyphicon-edit'></i>  EDIT</a></td>
                  </tr> 
                @endif
              @endforeach
         @endif
     @endforeach
  @endforeach  
</table> 
<br> 
@else 
 <div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>	
      <strong>No Student Records !</strong> 
    </div>

    @endif
  </div>
</div>

@endsection

@section('scripts')
<script>
    function myFunction() {
      // Declare variables 
      var input, filter, table, tr, td, i;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[2];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } 
      }
    }
    
</script>
<script>
$(document).ready(function () {
  $('#myTable').DataTable({
    "scrollY": "200px",
    "scrollCollapse": true,
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection
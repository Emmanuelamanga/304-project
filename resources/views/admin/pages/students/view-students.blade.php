@extends('admin.layout.auth')

@section('left-nav')

    @include('admin.inc.left-nav')
@endsection

@section('window')

@if(count($students)>0)
<h1>ALL STUDENTS {{count($students)}}</h1>
@include('admin.inc.messages')
   <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
    <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-search" aria-hidden="true"></i></div>
        </div>
        <input type="text" class="form-control py-0" onkeyup="myFunction()" id="myInput" placeholder="Search ...">
    </div>


	<table id="myTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
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
      </th>
      <th class="th-sm">HOBBY
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">D.O.R
        <i class="fa fa-sort float-right" aria-hidden="true"></i>
      </th>
      <th class="th-sm">EDIT
      </th>
    </tr>
  </thead>
  <tbody>
  	
  		@foreach($students as $student)
		    <tr>
		      <td>{{$student->name}}</td>
		      <td>{{$student->adm_no}}</td>
		      <td>{{$student->dob}}</td>
		      <td>{{$student->class}}</td>
		      <td>{{$student->email}}</td>
		      <td>{{$student->hobby}}</td>
		      <td>{{$student->created_at}}</td>
          <td> <a href="students/{{$student->id}}/edit" class="btn btn-sm btn-info" > <i class='glyphicon glyphicon-eye-open'></i> EDIT</a></td>
		    </tr>
    	@endforeach
    	
  </tbody>
  <tfoot>
    <tr>
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
       </th>
      <th>HOBBY</i>
      </th>
      <th>D.O.R</i>
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
        td = tr[i].getElementsByTagName("td")[0];
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
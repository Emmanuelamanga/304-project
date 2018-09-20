@extends('admin.layout.auth')


@section('left-nav')
    @include('admin.inc.left-nav')
@endsection

@section('window')
    @include('admin.inc.messages')
   
    <div class="panel panel-default">
        <div class="panel-heading">
            TEACHER(s), ROOM(s) AND THEIR SUBJECT(s)<a href="{{route('teacherRoom.create')}}" class="btn btn-info pull-right"> 
        <span class="glyphicon glyphicon-plus"></span> ADD TEACHER ROOMS </a> 
        </div>
        <div class="panel-body">
    <!-- search -->
    {{-- <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
    <div class="input-group mb-4 mr-sm-2">
        <div class="input-group-prepend">
            <div class="input-group-text"> <i class="fa fa-search" aria-hidden="true"></i></div>
        </div>
        <input type="text" class="form-control py-0" onkeyup="myFunction()" id="myInput" placeholder="Enter Adm no ...">
    </div> --}}
    <!-- endserch -->
    <!-- check teachers -->
        @if(count($teachers)>0)
        <!-- loop through the teachers make a table for each  teacher-->
            @foreach($teachers as $teacher)               
            <table id="myTable" class="table table-condensed table-sm table-bordered table-hover text-center">
                <thead>
                    <th class="text-center h4" colspan="2">{{strtoupper($teacher->name)}}</th>            
                </thead>  
                <tbody>
                    <tr>
                        <th class="text-center">ROOM</th>
                        <th class="text-center">SUBJECT</th>
                    </tr>
                    <tr>
                    <!-- check teachers with rooms and subjects display rooms and subjects of current teacher -->
                      @if(count($teacher_subjects)>0)
                         
                            @foreach($teacher_subjects as $teacher_subject)
                            <tr>
                            <!--check match id  -->
                                @if($teacher->id_no == $teacher_subject->id_no)
                                    
                                        <td>                                                                
                                            <!-- {{$teacher_subject->room_ref}} -->
                                            {{$room->get_room($teacher_subject->room_ref)->class_name}}
                                        </td> 

                                        <td>
                                            {{$subject->get_subject($teacher_subject->ref_no)->subject_name}}
                                        </td>                                         
                                @endif 
                            </tr>                       
                            @endforeach 
                            
                        @else
                            no room and subject
                        @endif      
                </tbody>
            </table>
            @endforeach
        @else
            no teachers
        @endif
    <!-- end teachers -->   

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
        td = tr[i].getElementsByTagName("th")[0];
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
@extends('teacher.layout.auth')

@section('content')
   
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center clearfix h3">ADD STUDENTS RESULTS</div>
                <div class="panel-body">
                    @include('admin.inc.messages')
                    <!-- students table -->
                    <table class="table table-bordered table-hover table-striped text-center">
                        <thead class="text-uppercase">
                            <th class="text-center">#</th>
                            <th class="text-center">Admission Number</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Room</th>
                        </thead>
                        <tbody>
                            @if(count($students)>0)
                                @foreach($students as $key => $student)
                                   <tr>  
                                        <td>{{$key+1}}</td>
                                        <td>{{$student->adm_no}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->room}}</td>
                                        <td><a href="{{route('results.show',$student->id)}}" class="btn btn-info"> <span class="glyphicon glyphicon-plus"> </span> Add</a></td>
                                   </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-info"> <strong>OOPS...!!! REGISTERED STUDENTS HAVE RECORDS</strong></div>
                                </td>
                            </tr>
                            @endif  
                        </tbody>
                        <tfoot class="text-uppercase">
                            <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Admission Number</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Room</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

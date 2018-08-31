@extends('teacher.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center h3">UNPROCESSED REPORTS</div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>ADM</th>
                            <th>NAME</th>
                            <th>CLASS</th>
                            <th>FUNCTION</th>
                        </thead>
                        <tbody>
                        @if(count($students)>0)
                            @foreach($students as $key=> $student)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$student->adm_no}}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->room}}</td>
                                    <!-- <td> <a href="{{route('reports.show', [$student->id])}}" class="btn btn-info btn-sm "> <span class="glyphicon glyphicon-eye-open"></span> {{__('VIEW')}} </a> </td> -->
                                    <td> <a href="{{ url('users/report/download') }}">Download PDF</a></td>
                                         <a href="{{ url('users/report/view') }}">view PDF</a></td>
                                </tr>{{$student->id}} <br>

                            @endforeach
                        @endif
                        </tbody>
                        <tfoot>
                            <th>#</th>
                            <th>ADM</th>
                            <th>NAME</th>
                            <th>CLASS</th>
                            <th>FUNCTION</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
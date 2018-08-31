
 @extends('teacher.layout.auth')

@section('styles')
    <style>
    .table{
        margin:auto;
        width:90%;
    }
 
    </style>
@endsection

@section('content')
      <div class="row">           
            <table class='table table-bordered'>
            <tr>
                <th colspan="7" class="text-center">CREATE REPORTS TABLE</th>
            </tr>
                <tr>
                    <th>id</th>
                    <th>ADM NO.</th>
                    <th>NAME</th>
                    <th>CLASS</th>
                    <th>EMAIL</th>
                    <th>VIEW</th>
                    <th>DOWNLOAD</th>
                </tr>
                @foreach ($users as $key => $user)
                <tr>
                <td>{{ $key+1}}</td>
                <td>{{ $user->adm_no }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->room }}</td>
                    <td>{{ $user->email }}</td> 
                    <!-- <td><a href="{{ url('users/report/view')}}">view PDF</a></td> -->
                    <td><a target="_blank"  class="btn btn-info btn-sm" href='{{ url("pdf/{$user->id}")}}'><span class="glyphicon glyphicon-eye-open"></span> View PDF</a></td>
                    <td><a href='{{ url("pdf/report/{$user->id}") }}' class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-download-alt"></span> Download PDF</a></td>
                </tr>
                @endforeach
            </table>
        </div>
@endsection
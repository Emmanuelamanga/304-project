@extends('teacher.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">SELECT SUBJECT</div>
                <div class="panel-body">
                @foreach($subjects as $rm)
                    <ul>
                        <li>
                            <a href="{{route('marks.edit', [$rm->id])}}" >{{ $rm->subject_name}}</a> 
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
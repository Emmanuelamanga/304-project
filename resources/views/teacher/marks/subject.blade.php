@extends('teacher.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center h2">SELECT SUBJECT</div>
                <div class="panel-body">
                @if(count($subjects)>0)
                    @foreach($subjects as $rm)
                        <ul>
                            <li>
                                <a href="{{route('marks.edit', [$rm->id])}}" class="btn btn-default" > {{ $rm->subject_name}}</a> 
                            </li>
                        </ul>
                    @endforeach
                @else
                <span class="alert alert-info">NO SUBJECTS SET</span>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
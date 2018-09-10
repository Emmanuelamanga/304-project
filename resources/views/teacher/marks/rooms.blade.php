@extends('teacher.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @include('admin.inc.messages')
            <div class="panel panel-default">
                <div class="panel-heading">SELECT ROOM</div>
                <div class="panel-body">
                @if(count($rooms)>0)
                    @foreach($rooms as $rm)
                        <ul>
                          <li> <a href="{{route('marks.show', [$rm->id])}}" class="btn btn-default" >{{ $rm->class_name }}</a> </li>
                        </ul>
                    @endforeach
                @else
                        <span class="alert alert-danger">NO ROOMS ALLOCATED</span>
                @endif
                
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
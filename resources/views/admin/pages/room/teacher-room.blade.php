@extends('admin.layout.auth')


@section('left-nav')
    @include('admin.inc.left-nav')
@endsection

@section('window')
    @include('admin.inc.messages')
    <div class="panel panel-default">
        <div class="panel-heading">
            TEACHERs, ROOMS AND THEIR ROOMS
        </div>
        <div class="panel-body">
        <a href="{{route('teacherRoom.create')}}" class="btn btn-info"> 
        <span class="glyphicon glyphicon-plus"></span> ADD TEACHER ROOMS </a>
        </div>
    </div>
@endsection
@extends('teacher.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading h2 text-center">{{Auth::user()->role}} Dashboard</div>
                <div class="panel-body text-center">
                <img src="{{asset('storage/techer_dsh.jpg')}}" class="img-circle" alt="Cinque Terre" width="304" height="236"> 
                <br>
                <br> 
                You are logged in as <span><strong>{{Auth::user()->role}}</strong> </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

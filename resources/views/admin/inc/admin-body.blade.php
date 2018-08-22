@extends('admin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4"> 

            

        </div>

        <div class="col-sm-8">
        
            @yield('window')
        
        </div>
    </div>
    @include('admin.inc.footer')
</div>
@endsection

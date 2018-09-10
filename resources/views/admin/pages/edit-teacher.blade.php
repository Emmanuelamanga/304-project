@extends('admin.layout.auth')

@section('styles')

@endsection

@section('content')
	
@endsection

@section('left-nav')
    @include('admin.inc.left-nav')
@endsection
	
@section('window')
    @include('admin.inc.messages')
<div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading text-center h4">UPDATE TEACHER</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('teachers.update',[$teacher->id]) }}">
                            {{ csrf_field() }}
                            {{ @method_field('PATCH') }}                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('$teacher->name',$teacher->name) }}" >
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                <!-- id number -->
                            <div class="form-group{{ $errors->has('id_no') ? ' has-error' : '' }}">
                                <label for="id_no" class="col-md-4 control-label">ID Number</label>
                                <div class="col-md-6">
                                    <input id="id_no" type="text" class="form-control" name="id_no" value="{{ old('$teacher->id_no',$teacher->id_no) }}" >
                                    @if ($errors->has('id_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                    <!-- telephone number -->
                         <div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
                                <label for="tel" class="col-md-4 control-label">Phone No.</label>
                                <div class="col-md-6">
                                    <input id="tel" type="text" class="form-control" name="tel" value="{{ old('$teacher->tel',$teacher->tel) }}" >
                                    @if ($errors->has('tel'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tel') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- email -->
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('$teacher->email',$teacher->email) }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <!-- role -->
                             <div class="form-group {{$errors->has('t_role') ? ' has-error' : '' }}">
                               
                            <label for="name" class="col-md-4 control-label">ROLE</label>
                                  <div class="col-md-6">   <small>Current: {{$teacher->role}}</small>
                                  <select id="tch" class="form-control {{ $errors->has('t_role') ? 'is-invalid' : '' }}" onchange="disableElement()" name="t_role"  value="{{ old('t_role') }}">
                                        <option value="" disabled selected>Select Role</option>                    
                                            <option value="Teacher">Teacher</option>
                                            <option value="Class Teacher">Class Teacher</option>                                               
                                    </select>    
                                        @if ($errors->has('t_role'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('t_role') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div> 
                            <!-- rooms display if class teacher selected -->
                            <div id="roomid" class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox form-group {{$errors->has('room') ? ' has-error' : '' }}">   
                                @if(count($rooms)> 0)
                                    @foreach($rooms as $room)
                                     <label class="radio-inline">
                                     <input id="room" name="room" type="radio" value="{{$room->room_ref}}"   > {{$room->class_name}} </label>
                                    @endforeach
                                @else
                                        <span class="alert alert-info">NO ROOMS</span>
                                @endif
                                    @if ($errors->has('room'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('room') }}</strong>
                                            </span>
                                        @endif                                
                                </div>
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                       <span class="glyphicon glyphicon-refresh"></span>  UPDATE
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
 

@endsection

@section('scripts')
<script>
    function myfunction(){
        var rd = document.getElementById('roomid');

        // hide
        rd.style.visibility = 'hidden'; 
    }

    function disableElement() {

        var e = document.getElementById("tch");
        var strUser = e.options[e.selectedIndex].value;

        if (strUser == "Teacher") {

        var div = document.getElementById('room');

        // // hide
        div.style.visibility = 'hidden'; 
  
        }else{
            // 
            var dr = document.getElementById('roomid');

            // hide
            dr.style.visibility = 'visible'; 

            document.getElementById("room").disabled = false;

        } 
        
    }
</script>

@endsection

@extends('admin.layout.auth')

@section('content')
   
@endsection

@section('left-nav')
    @include('admin.inc.left-nav')
@endsection


@section('window')
 @include('admin.inc.messages')
 <div class="panel panel-default">
 <div class="panel-heading text-center">
        <h3>ADD INDEX CLASS</h3>
 </div>
 <div class="panel-body">
 <form class="text-center border border-light p-5" method="POST" action="{{route('rooms.store')}}">
        @csrf
        
        <div class="row">  
        <!-- Class Ref Number -->
           <div class="col-md-6">
                <div class="form-group{{ $errors->has('room_ref') ? ' has-error' : '' }}">  
                  <input id="room_ref" type="hidden" class="form-control{{ $errors->has('room_ref') ? ' is-invalid' : '' }}" name="room_ref" value="{{ old('$room_ref',$room_ref) }}" >
                    <input id="room_ref" type="text" class="form-control{{ $errors->has('room_ref') ? ' is-invalid' : '' }}"  value="{{ old('$room_ref',$room_ref)  }}" disabled>
                    @if ($errors->has('room_ref'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('room_ref') }}</strong>
                        </span>
                    @endif 	
                    </div>
                </div>            
                        
        <!-- Class Name -->
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}">  
                    <input id="class_name" type="text" class="form-control{{ $errors->has('class_name') ? ' is-invalid' : '' }}" name="class_name" value="{{ old('class_name') }}" placeholder="Class  Name">
                    @if ($errors->has('class_name'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('class_name') }}</strong>
                        </span>
                    @endif 	
                    </div>
                </div>

            </div>

    
          <!-- Submit  button -->
        <button class="btn btn-success my-2 " type="submit"> <i class="glyphicon glyphicon-ok-sign"></i> ADD INDEX CLASS</button>

  </form>
 </div>
 </div>
 
 
@endsection
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
        <h3>ADD CLASS</h3>
 </div>
 <div class="panel-body">
 <form class="text-center border border-light p-5" method="POST" action="{{route('rooms.store')}}">
        @csrf
        
        <div class="row">  
        <!-- Class Ref Number -->
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('class_referance_number') ? ' has-error' : '' }}">  
                    <input id="class_referance_number" type="text" class="form-control{{ $errors->has('class_referance_number') ? ' is-invalid' : '' }}" name="class_referance_number" value="{{ old('class_referance_number') }}" placeholder="Class Reference Number">
                    @if ($errors->has('class_referance_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('class_referance_number') }}</strong>
                        </span>
                    @endif 	
                </div>
            </div>
            
<!-- Class Name -->
        <div class="col-md-6">
          <div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}">  
            <input id="class_name" type="text" class="form-control{{ $errors->has('class_name') ? ' is-invalid' : '' }}" name="class_name" value="{{ old('class_name') }}" placeholder="Class  Name">
            @if ($errors->has('class_name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('class_name') }}</strong>
                </span>
            @endif 	
            </div>
        </div>
        </div>

        <br>
        <!-- capacity -->
        <div class="row ">
        	<div class="col-md-6">
            <div class="form-group{{ $errors->has('class_capacity') ? ' has-error' : '' }}"> 
        		<input id="class_capacity" type="number" minlength="15" class="form-control{{ $errors->has('class_capacity') ? ' is-invalid' : '' }}" name="class_capacity" value="{{ old('class_capacity') }}" placeholder="Class Capacity">
            @if ($errors->has('class_capacity'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('class_capacity') }}</strong>
                </span>
            @endif
        	</div>
        </div>
            <!-- class teacher -->
        <div class="col-md-6">
                    <!-- select class -->
            <div class="form-group {{$errors->has('class_teacher') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">CLASS TEACHER</label>
                    <div class="col-md-6">  
                    <select class="form-control {{ $errors->has('class_teacher') ? 'is-invalid' : '' }}" name="class_teacher"  value="{{ old('class_teacher') }}">
                        <option value="" disabled selected>Select Class</option>
                        @if(count($teachers)>0)
                            @foreach($teachers as $teacher)
                            <option value="{{$teacher->id_no}}">{{strtoupper($teacher->name)}}</option> @endforeach
                        @else
                        {{ _('No CLASSES Yet') }} 
                        @endif         
                    </select>    
                        @if ($errors->has('class_teacher'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('class_teacher') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> 
         </div>
    </div>
      <br>
          <!-- Submit  button -->
        <button class="btn btn-info my-2 " type="submit">ADD CLASS</button>

  </form>
 </div>
 </div>
 
 
@endsection
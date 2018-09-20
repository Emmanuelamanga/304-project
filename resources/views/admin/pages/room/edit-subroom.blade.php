@extends('admin.layout.auth')

@section('content')
   
@endsection

@section('left-nav')
    @include('admin.inc.left-nav')
@endsection

@section('window')
 @include('admin.inc.messages')
 <div class="panel panel-default">
 <div class="panel-heading text-center text-uppercase">

        <h3 >Edit SUB-CLASS</h3>

 </div>
 <div class="panel-body">
 <form class="text-center border border-light p-5" method="POST" action="{{route('sub_room.update', [$subroom->id])}}">
        @csrf
        @method('PATCH')
       
        <div class="row">  
        <!-- select Class Ref Number -->
        <div class="col-md-6">  
            <div class="form-group{{$errors->has('room_ref') ? ' has-error' : '' }}">
                    <input type="hidden" name="room_ref" value="{{$subroom->room_ref}}">
                        <select class="form-control {{ $errors->has('room_ref') ? 'is-invalid' : '' }}" name="room_ref" disabled>
                            <option value="{{$subroom->room_ref}}" selected>{{$rm_name->room_name($subroom->room_ref)->class_name}}</option>
                            @if(count($rooms)>0)
                                @foreach($rooms as $room)
                                    <option value="{{$room->room_ref}}">{{strtoupper($room->class_name)}}</option>
                                @endforeach
                            @else
                                <option selected disabled> {{ _('No CLASS rooms') }}</option> 
                            @endif         
                        </select>    
                        @if ($errors->has('room_ref'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('room_ref') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>             
            
        <!-- Class Name -->
        <div class="col-md-5">
            <div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}">  
                <input id="class_name" type="text" class="form-control{{ $errors->has('class_name') ? ' is-invalid' : '' }}" name="class_name" value="{{ old('$subroom->sub_class_name',$subroom->sub_class_name) }}" placeholder="Class  Name">
                @if ($errors->has('class_name'))
                    <span class="help-block" role="alert">
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
        		<input id="class_capacity" type="number" minlength="15" class="form-control{{ $errors->has('class_capacity') ? ' is-invalid' : '' }}" name="class_capacity" value="{{ old('$subroom->class_capacity', $subroom->class_capacity) }}" placeholder="Class Capacity">
            @if ($errors->has('class_capacity'))
                <span class="help-block" role="alert">
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
                    <div class="col-md-8">  
                        <select class="form-control {{ $errors->has('class_teacher') ? 'is-invalid' : '' }}" name="class_teacher"  value="{{ old('class_teacher') }}">
                            <option value="{{$subroom->class_teacher}}" selected>{{$subroom->class_teacher}} : {{strtoupper($gt_teacher->get_classTeacher($subroom->class_teacher)->name)}}</option>
                            @if(count($teachers)>0)
                                @foreach($teachers as $teacher)
                                <option value="{{$teacher->id_no}}">{{$teacher->id_no}} <strong>:</strong> {{strtoupper($teacher->name)}}</option> @endforeach
                            @else
                                <option selected disabled> {{ _('No CLASS TEACHERS') }}</option> 
                            @endif         
                        </select>    
                        @if ($errors->has('class_teacher'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('class_teacher') }}</strong>
                            </span>
                        @endif
                    </div>
                </div> 
            </div>
        </div>
        <br>
          <!-- Submit  button -->
        <button class="btn btn-primary my-2 " type="submit"> <i class="glyphicon glyphicon-refresh"></i> UPDATE SUB-CLASS</button>

  </form>
 </div>
 </div>
 
 
@endsection
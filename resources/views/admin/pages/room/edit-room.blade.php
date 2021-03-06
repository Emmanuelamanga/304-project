@extends('admin.layout.auth')

@section('content')
   
@endsection

@section('left-nav')
    @include('admin.inc.left-nav')
@endsection


@section('window')
 @include('admin.inc.messages')
<div class="panel panel-default">
    <div class="panel-heading text-center ">
            <h3>EDIT CLASS</h3>
    </div>
    <div class="panel-body">
        <form class="text-center border border-light p-5" method="POST" action="{{route('rooms.update',[$room->id])}}">                                           
            @csrf
            {{ @method_field('PATCH') }}

            
            <!-- Class Ref Number -->
            <label for="name" class="col-md-4 control-label">CLASS REFERANCE NUMBER</label>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('class_referance_number') ? ' has-error' : '' }}">  
                        <input id="class_referance_number" type="text" class="form-control {{ $errors->has('class_referance_number') ? ' is-invalid' : '' }}" name="class_referance_number" value="{{ old('$room->room_ref',$room->room_ref) }}">
                        @if ($errors->has('class_referance_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('class_referance_number') }}</strong>
                            </span>
                        @endif 	
                    </div>
                </div> <br>
            <div class="row">
            <div class="col-md-6">
            <!-- Class Name --> 
            <div class="form-group {{$errors->has(' class_name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">FORM</label>
                        <div class="col-md-6">  
                        <select class="form-control {{ $errors->has(' class_name') ? 'is-invalid' : '' }}" name=" class_name" >
                            <option value="{{$room->class_name}}"  selected>{{strtoupper($room->class_name)}}</option>
                            @if(count($roomx)>0)
                                @foreach($roomx as $roomy)
                                <option value="{{$roomy->class_name}}">{{strtoupper($roomy->class_name)}}</option> 
                                @endforeach
                            @else
                            {{ _('No CLASSES Yet') }} 
                            @endif         
                        </select>    
                            @if ($errors->has(' class_name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first(' class_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div> 
                </div>    
    <br>
    <!-- class teacher -->
    <div class="col-md-6">       
            <div class="form-group {{$errors->has('class_teacher') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">CLASS TEACHER</label>
                    <div class="col-md-8"> 
            @if(count($current_teacher)>0)
                    @foreach($current_teacher as $tch)
                        <small>current: {{$tch->id_no }} : {{strtoupper($tch->name)}}</small>
                    @endforeach
                     @endif
                    <select class="form-control {{ $errors->has('class_teacher') ? 'is-invalid' : '' }}" name="class_teacher" >
                        
                        @foreach($current_teacher as $tch)
                            <option value="{{$tch->id_no}}" selected>{{$tch->id_no }} : {{strtoupper($tch->name)}}</option> 
                        @endforeach
           
                        @if(count($teachers)>0)
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id_no}}">{{$teacher->id_no}} : {{strtoupper($teacher->name)}}</option> 
                            @endforeach
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
        </div> <br>
            <!-- capacity -->
        <label for="name" class="col-md-4 control-label">CLASS CAPACITY</label> 
                <div class="col-md-6">
                <div class="form-group{{ $errors->has('class_capacity') ? ' has-error' : '' }}"> 
                    <input id="class_capacity" type="number" minlength="15" class="form-control{{ $errors->has('class_capacity') ? ' is-invalid' : '' }}" name="class_capacity" value="{{ old('$room->class_capacity',$room->class_capacity) }}" placeholder="Class Capacity">
                @if ($errors->has('class_capacity'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('class_capacity') }}</strong>
                    </span>
                @endif
                </div>
            
            
        <br>
            <!-- Submit  button -->
            <button class="btn btn-primary my-4 btn-block" type="submit"> <span class="glyphicon glyphicon-refresh"></span>  UPDATE</button>

    </form>
    </div>

</div>

 
@endsection
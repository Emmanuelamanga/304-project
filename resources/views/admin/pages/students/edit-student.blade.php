@extends('admin.layout.auth')

@section('left-nav')
    @include('admin.inc.left-nav')
@endsection

@section('window')
    {{$student}}
<div class="panel panel-default">
    <div class="panel-heading">EDIT STUDENT RECORD</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{url('student.update',[$student->id])}}">
            {{ csrf_field() }}                                           
            {{ @method_field('PATCH') }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('$student->name',$student->name) }}" autofocus>
                    @if ($errors->has('name'))                                        
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- registration number -->
            <div class="form-group{{ $errors->has('admission_number') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Registration  No.</label>
                <div class="col-md-6">
                    <input  type="text" id="search" class="form-control{{ $errors->has('admission_number') ? ' is-invalid' : '' }}" name="admission_number" value="{{ old('$student->adm_no',$student->adm_no) }}" placeholder="">
                    @if ($errors->has('admission_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('admission_number') }}</strong>
                        </span>
                    @endif
                </div>
            </div>                   


            <!-- select class -->
                <div class="form-group {{$errors->has('student_class') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">FORM</label>
                        <div class="col-md-6">  
                        <select class="form-control {{ $errors->has('student_class') ? 'is-invalid' : '' }}" name="student_class"  value="{{ old('$student->student_class',$student->student_class) }}">
                            <option value="" disabled selected>Select Class</option>
                            @if(count($rooms)>0)
                                @foreach($rooms as $room)
                                <option value="{{$room->class_name}}">{{strtoupper($room->class_name)}}</option> 
                                @endforeach
                            @else
                            {{ _('No CLASSES Yet') }} 
                            @endif         
                        </select>    
                            @if ($errors->has('student_class'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('student_class') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>        
                <!-- Parents id number -->
                <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Parent ID No.</label>
                <div class="col-md-6">
                    <input  type="text" id="search" class="form-control{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" name="parent_id" value="{{ old('$student->parent_id',$student->parent_id) }}" placeholder="Parent's National ID Number">
                    @if ($errors->has('parent_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('parent_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>   
                        <!--dob  -->
            <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                <label for="date_of_birth" class="col-md-4 control-label">Date Of Birth</label>
                <div class="col-md-6">
                    <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
                    @if ($errors->has('date_of_birth'))
                        <span class="help-block">
                            <strong>{{ $errors->first('date_of_birth') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <!-- email -->
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('$student->email',$student->email) }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        UPDATE
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

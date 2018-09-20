@extends('admin.layout.auth')

@section('left-nav')
    @include('admin.inc.left-nav')
@endsection

@section('styles')
    <style>
        li .in{
            text-indent: 500px;
        }
    </style>
@endsection

@section('window')

            <div class="panel panel-default">
                <div class="panel-heading h3 text-center">REGISTER A NEW STUDENT</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{url('admin/students')}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- registration number -->
                        <div class="form-group{{ $errors->has('admission_number') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Regstration  No.</label>
                            <div class="col-md-6">
                             <input  type="hidden" id="search" class="form-control{{ $errors->has('admission_number') ? ' is-invalid' : '' }}" name="admission_number" value="{{ old('$adm',$adm) }}" palaceholder="{{$adm}}" >
                                <input  type="text" id="search" class="form-control{{ $errors->has('admission_number') ? ' is-invalid' : '' }}"  value="{{ old('$adm',$adm) }}" palaceholder="{{$adm}}" disabled>
                                @if ($errors->has('admission_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('admission_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                   


                        <!-- select class -->
                            {{-- <div class="form-group {{$errors->has('student_class') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">FORM</label>
                                  <div class="col-md-6">  
                                  <select class="form-control {{ $errors->has('student_class') ? 'is-invalid' : '' }}" name="student_class"  value="{{ old('student_class') }}">
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
                                </div>         --}}

                         <!-- Parents id number -->
                        <div class="form-group {{$errors->has('parent_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Parent/Guardian </label>
                                <div class="col-md-6">  
                                <select class="form-control {{ $errors->has('parent_id') ? 'is-invalid' : '' }}" name="parent_id"  value="{{ old('parent_id') }}">
                                    <option value="" disabled selected>Select Parent/Guardian</option>
                                    @if(count($studentParent)>0)
                                        @foreach($studentParent as $std_p)
                                        <option value="{{$std_p->id}}">{{$std_p->id_no}} : {{strtoupper($std_p->name)}}</option> 
                                        @endforeach
                                    @else
                                    {{ _('No CLASSES Yet') }} 
                                    @endif         
                                </select>    
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
                                <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" max="2003-01-01" value="{{ old('date_of_birth') }}">
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
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                            <!-- password -->
                        {{-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                        <!-- confirm password -->
                        {{-- <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}
                        <label for="email" class="col-md-4 control-label">FORM</label>
                        <div class="col-md-6">
                         <div class="form-group{{ $errors->has('room') ? ' has-error' : '' }}">
                            @if (count($rooms)>0)
                                {{-- loop through the classes --}}
                                @foreach ($rooms as $room)
                                    <ul>  
                                        <li>
                                            <label>
                                                <input type="radio" name="mainroom" value="{{$room->room_ref}}">{{$room->class_name}}
                                            </label>
                                        </li>
                                    @if (count($subrooms)>0)
                                    {{-- loop through the subrooms display --}} 
                                    
                                    @foreach ($subrooms as $subroom)
                                       
                                            @if ($room->room_ref == $subroom->room_ref)
                                            <div class="radio">
                                               <li>&nbsp; <label><input type="radio"   name="sub_room" value="{{$subroom->sub_room_ref}}">{{$subroom->sub_class_name}}</label></li>
                                            </div>                                                
                                            @endif
                                       
                                    @endforeach 
                                  
                                    @endif
                                                                
                                    </ul>                                
                                @endforeach
                            @else
                                no rooms
                            @endif 
                             @if ($errors->has('room'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('room') }}</strong>
                                    </span>
                            @endif 
                            </div>                        
                        </div>
                            

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-pencil"></i>  REGISTER
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



@endsection

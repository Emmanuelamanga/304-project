@extends('admin.layout.auth')


@section('left-nav')
    @include('admin.inc.left-nav')
@endsection

@section('window')
    @include('admin.inc.messages')
 <div class="panel panel-default">
        <div class="panel-heading">
            ADD  TEACHER TO ROOM
        </div>
        <div class="panel-body">
        <form class="text-center border border-light p-5" method="POST" action="{{route('teacherRoom.store')}} ">
        {{ csrf_field() }}
               <div class="row">
                 <!-- select Teacher -->
                 <div class="form-group {{$errors->has('id_no') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Select Teacher</label>
                        <div class="col-md-4">  
                        <select class="form-control {{ $errors->has('id_no') ? 'is-invalid' : '' }}" name="id_no"  value="{{ old('id_no') }}">
                            <option value="" disabled selected>Select Teacher</option>
                            @if(count($teachers)>0)
                                @foreach($teachers as $teacher)
                                <option value="{{$teacher->id_no}}">{{$teacher->id_no}} <strong>:</strong> {{strtoupper($teacher->name)}}</option> @endforeach
                            @else
                                <option selected disabled> {{ _('No CLASS TEACHERS') }}</option> 
                            @endif         
                        </select>    
                            @if ($errors->has('teacher'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('teacher') }}</strong>
                                </span>
                            @endif
                        </div>
                    <!-- select room -->
                    <div class="form-group {{$errors->has('room_ref') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">CLASS ROOM</label>
                        <div class="col-md-3">  
                        <select class="form-control {{ $errors->has('room_ref') ? 'is-invalid' : '' }}" name="room_ref"  value="{{ old('room_ref') }}">
                            <option value="" disabled selected>Select Class room</option>
                            @if(count($rooms)>0)
                                @foreach($rooms as $room)
                                     <option value="{{$room->room_ref}}">{{strtoupper($room->class_name)}}</option> 
                                @endforeach
                            @else
                                <option selected disabled> {{ _('No CLASS ROOMS') }}</option> 
                            @endif         
                        </select>    
                            @if ($errors->has('room_ref'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('room_ref') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
   </div><br>
           <div class="row text-center"> 
           <div class="col-md-2">
           </div>
           <div class="col-md-8">
            <table class="table table-bordered">
            @if(count($subjects)>0)               
                <th>Subject Name</th>
                <th>Select</th>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{$subject->subject_name}}</td>
                        <td> 
                            <input type="checkbox" name="ref_no[]" id="" value="{{$subject->ref_no}}">                    
                            @if ($errors->has('ref_no'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ref_no') }}</strong>
                                </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
            
                    @else
                    <tr>
                        <td>  <span class="alert alert-warning" role="alert">
                                        <strong>NO SUBJECTS</strong>
                                    </span></td>
                    </tr>                    
                @endif
               </table>                               
             </div>
           </div> 
           <div class="row">
                     <!-- Submit  button -->
        <button class="btn btn-success my-2 " type="submit"> <i class="glyphicon glyphicon-plus"></i> ADD TEACHER TO CLASS</button>

           </div>
         
                    

            </form>
        </div>            
</div>

@endsection
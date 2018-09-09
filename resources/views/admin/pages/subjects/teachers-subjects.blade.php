@extends('admin.layout.auth')

    @section('left-nav')
        @include('admin.inc.left-nav')
    @endsection

    @section('window')
        <!-- @include('admin.inc.messages') -->
        @if ($errors->any())
    <div class="alert alert-danger text-center h4">
        <ul>
            @foreach ($errors->all() as $error)
            <button type="button" class="close" data-dismiss="alert">×</button>	
            <strong >{{ $error }}</strong>
            @endforeach
        </ul>
    </div>
@endif
        <div class="panel panel-default">
            <div class="panel-heading clearfix h3">TEACHERS SUBJECTS
            <span class="pull-right "> <a href="myModal" class="btn btn-info" data-toggle="modal" data-target="#myModal"> ADD SUBJECT TEACHER</a> </span>
            </div>
             <div class="panel-body">
                <table class="table">
                    <thead>
                        <th>Teachers Name</th>
                        <th>Subjects</th> 
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Edit</th>
                    </thead>
                    <tbody>
                    @if(count($teachers_subjects)>0)
                        @foreach($teachers_subjects as $teachers_subject)
                            <tr>
                                <td>{{$teachers_subject->name}}</td>
                                <td>{{$teachers_subject->ref_no}}</td>
                                <td>{{$teachers_subject->created_at}}</td>
                                <td>{{$teachers_subject->updated_at}}</td>
                                <td> <a href="#" class="btn btn-info btn-sm">EDIT</a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td> <div class="alert alert-warning">NO Teachers Assigned Subjects</div> </td>
                        </tr>
                    @endif
                    </tbody>
                
                </table>
             </div>
        </div>  
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('setRoom') }}">
            @csrf
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">SELECT ROOM</h4>
            </div>
            <div class="modal-body">
                <!-- select Class -->
                <div class="form-group {{$errors->has('room') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">SELECT ROOM</label>
                        <div class="col-md-6">  
                        <select class="form-control {{ $errors->has('room') ? 'is-invalid' : '' }}" name="room"  value="{{ old('room') }}">
                            <option value="" disabled selected>Select Class</option>
                            @if(count($rooms)>0)
                                @foreach($rooms as $room)
                                <option value="{{$room->room_ref}}">{{strtoupper($room->class_name)}}</option> 
                                @endforeach
                            @else
                            {{ _('No CLASSES Yet') }} 
                            @endif         
                        </select>    
                            @if ($errors->has('room'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('room') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
            </div>
            <div class="modal-footer"> 
            <input type="submit" class="btn btn-success" value="SET">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

        </div>
        </div>
    @endsection
    
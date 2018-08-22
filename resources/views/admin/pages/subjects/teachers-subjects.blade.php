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
                    @endif
                    </tbody>
                
                </table>
             </div>
        </div>  
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('teachers_subjects.store') }}">
            @csrf
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">TEACHER SUBJECT FORM</h4>
            </div>
            <div class="modal-body">
                <!-- select class teacher -->
                <div class="form-group {{$errors->has('id_no') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">SUBJECT TEACHER</label>
                        <div class="col-md-6">  
                        <select class="form-control {{ $errors->has('id_no') ? 'is-invalid' : '' }}" name="id_no"  value="{{ old('id_no') }}">
                            <option value="" disabled selected>Select Subject Teacher</option>
                            @if(count($teachers)>0)
                                @foreach($teachers as $teacher)
                                <option value="{{$teacher->id_no}}">{{strtoupper($teacher->name)}}</option> 
                                @endforeach
                            @else
                            {{ _('No CLASSES Yet') }} 
                            @endif         
                        </select>    
                            @if ($errors->has('id_no'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('id_no') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <!-- select subject -->                        
                    <table class="table">
                        <tbody>
                            @if(count($subjects)>0)
                                @foreach($subjects as $subject)
                                <tr>
                                    <td>{{$subject->subject_name}}</td>
                                    <td> <input type="checkbox" value="{{$subject->ref_no}}" name="subject_id[]" id="subject_id"> </td>
                               </tr>
                                @endforeach 
                            @else

                            @endif
                                
                            </tbody>
                    </table>                   
            
            </div>
            <div class="modal-footer"> 
            <input type="submit" class="btn btn-success" value="ASSIGN SUBJECTS">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>

        </div>
        </div>
    @endsection
    
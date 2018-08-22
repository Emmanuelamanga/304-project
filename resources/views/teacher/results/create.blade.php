@extends('teacher.layout.auth')

@section('styles')
    <style>
    .pane{
        margin:auto;
        width:60%;
        
    }
    table{
        
    }
    td,th{
            width:200px;
            text-align:center;
        }
    tfoot,td{
        
    }
    </style>
@endsection

@section('content')

 <form role="form" method="POST" action="{{route('results.store')}}">
{{ csrf_field() }}
<div class="pane">
    @include('admin.inc.messages')
    <div class="form-group{{$errors->has('subject_ref') ? ' has-error' : '' }}">
        <label  class="control-label">SELECT SUBJECT :</label>  
            <select class="form-control {{$errors->has('subject_ref') ? 'is-invalid' : '' }}" name="subject_ref"  value="{{ old('subject_ref') }}">
                 @if(count($subjects)>0) 
                 <option value="" >Select Subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{$subject->ref_no}}">{{$subject->subject_name}}</option>
                    @endforeach
                    @else
                        {{ _('No SUBJECTS Yet') }} 
                    @endif
            </select>
            @if ($errors->has('subject_ref'))
                <span class="alert text-danger" role="alert">
                    <strong>{{ $errors->first('subject_ref') }}</strong>
                </span>
            @endif
    </div>   
    <br>
    <table class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">NAME</th>
        <th scope="col">MARKS</th>
        <th scope="col">COMMENT</th>
        </tr>
    </thead>
    <tbody>
    @if(count($students)>0) 
        @foreach($students as $key=> $student)
        <tr> 
        <th scope="row">{{$key+1}}</th>
                <td >{{$student->name}}</td>
                <td>
                <!-- <input type="text" name="marks" id="marks" class="form-control" placeholder="Enter Marks"> -->
                <div class="form-group{{ $errors->has('marks') ? ' has-error' : '' }}">
                        <input id="marks" type="text" class="form-control" name="marks" value="{{ old('marks') }}" placeholder="Enter Marks">
                        @if ($errors->has('marks'))
                            <span class="help-block">
                                <strong>{{ $errors->first('marks') }}</strong>
                            </span>
                        @endif
             
                </div>
                </td>
                <td>
                <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                    <select id="comment"  type="text"class="form-control {{$errors->has('comment') ? 'is-invalid' : '' }}" name="comment" value="{{ old('comment') }}" placeholder="Enter comments">
                    <!-- <select class="form-control" id="exampleFormControlSelect1"> -->
                   
                        <option value="" >Comment</option>
                        <option value="Below Average">Below Average</option>
                        <option value="Fair">Fair</option>
                        <option value="Average">Average</option>
                        <option value="Good">Good</option>
                        <option value="Excellent">Excellent</option>
                      
                    </select>  
                    @if ($errors->has('comment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('comment') }}</strong>
                            </span>
                        @endif
                    
                </div>
                </td>
        </tr> 
        @endforeach   
    @endif
    </tbody>
    <tfoot><input type="hidden" name="adm_no" id="idm_no" value="{{$student->adm_no}}">
        <td colspan=4 class="text-center"><button type="submit" class="btn btn-success">COMMIT RESULTS</button></td>
    </tfoot>
    </table>
</div>

</form>
@endsection

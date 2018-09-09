@extends('teacher.layout.auth')

@section('content')
    @include('admin.inc.messages')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> ENTER MARKS</div>
                <div class="panel-body">
                <form  role="form" method="POST" action="{{route('marks.store')}}">
                                    {{ csrf_field() }}
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>ADM NO</th>
                            <th>NAME</th>
                            <th>MARKS</th>
                        </thead>
                        <tbody>
                        @if(count($students)>0)
                        
                            @foreach($students as $key => $student)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$student->adm_no}}</td>
                                <td>{{$student->name}}</td>
                                <td>    
                                 <!--set admission numbers in an array  -->
                                    <input  type="hidden" class="form-control" name="adm_no[]" value="{{$student->adm_no}}">                  
                                    <!-- set the marks in an array -->
                                    <div class="col-xs-6">
                                        <div class="form-group{{ $errors->has('marks') ? ' has-error' : '' }}">
                                                <input id="marks" type="text" class="form-control" name="marks[]" value="{{ old('marks') }}" autofocus>
                                                @if ($errors->has('marks'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('marks') }}</strong>
                                                    </span>
                                                @endif                              
                                        </div>
                                    
                                  
                                </td>
                            </tr>
                            @endforeach
                            
                        @else
                            <tr>
                                <td>{{__('NO STUDENTS')}}</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-info">SUBMIT RESULTS</button>
                        </div>
                    </div>  
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
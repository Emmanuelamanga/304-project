@extends('admin.layout.auth')

    @section('left-nav')
        @include('admin.inc.left-nav')
    @endsection

    @section('window')
    @include('admin.inc.messages')

        <div class="panel panel-default">
            <div class="panel-heading clearfix"> SUBJECTS
            <span class="pull-right "> <a href="{{route('subjects.create')}}" class="btn btn-info"> ADD SUBJECT</a> </span>
            </div>
             <div class="panel-body">
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <th>Reference Number</th>
                        <th>Subject Name</th> 
                        <th>Created At</th>
                        <th>Updated At</th>
                    </thead>
                    <tbody>
                    @if(count($subjects)>0)
                        @foreach($subjects as $subject)
                          <tr> 
                            <td>{{$subject->ref_no}}</td>
                            <td>{{$subject->subject_name}}</td>
                            <td>{{$subject->created_at}}</td>
                            <td>{{$subject->updated_at}}</td>
                            <td><a href="#" class="btn btn-default" >Edit</a></td>
                         </tr>
                        @endforeach
                     @endif

                    </tbody>
                
                </table>
             </div>
        
        
        
        </div>  
    @endsection
    
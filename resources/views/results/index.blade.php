
@extends('teacher.layout.auth')

@section('content')

    <div class="row">
    
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading text-center clearfix h3">STUDENTS RESULTS</div>
                <div class="panel-body"> 
                @include('admin.inc.messages')
               
                    <!-- students table -->
                    <table class="table table-bordered  ">
                        <thead>
                           <th>#</th>
                           <th>ADM</th>
                           <th>Name</th>
                           <th>Maths</th>
                           <th>English</th>
                           <th>Kiswahili</th>
                           <th>Physics</th>
                           <th>Biology</th>
                           <th>Chemistry</th>
                           <th>C.R.E</th>
                           <th>History</th>
                           <th>Computer</th>
                           <th>Business</th>
                           <th>Agriculture</th>
                           <th>Geography</th>
                           <th>TOTAL</th>
                        </thead>
                        <tbody>
                        @if(count($results)>0)
                            @foreach($results as $key => $result)    
                                @if($result->id != '')
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$result->adm_no}}</td>
                                        <td>{{$result->name}}</td>
                                        <td>{{$result->math}}</td>
                                        <td>{{$result->eng}}</td>
                                        <td>{{$result->kiswahili}}</td>
                                        <td>{{$result->physics}}</td>
                                        <td>{{$result->biology}}</td>
                                        <td>{{$result->chemistry}}</td>
                                        <td>{{$result->CRE}}</td>
                                        <td>{{$result->history}}</td>
                                        <td>{{$result->computer}}</td>
                                        <td>{{$result->business}}</td>
                                        <td>{{$result->agriculture}}</td>
                                        <td>{{$result->geography}}</td>
                                        <td><a href="results/{{$result->id}}/edit" class="btn btn-info"> <span class="glyphicon glyphicon-eye-open">  </span> EDIT</a></td>
                                    </tr>
                                @else
                                    <!-- <tr>
                                        <td colspan="16">
                                            <div class="alert alert-info">
                                                {{_('NO RESULTS YET !!')}}
                                            </div>
                                         </td>
                                    </tr> -->
                                @endif
                            @endforeach
                        @else
                                <div class="alert alert-info">
                                    {{_('NO RESULTS YET !!')}}
                                </div>
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>ADM</th>
                                <th>Name</th>
                                <th>Maths</th>
                                <th>English</th>
                                <th>Kiswahili</th>
                                <th>Physics</th>
                                <th>Biology</th>
                                <th>Chemistry</th>
                                <th>C.R.E</th>
                                <th>History</th>
                                <th>Computer</th>
                                <th>Business</th>
                                <th>Agriculture</th>
                                <th>Geography</th>
                                <th>TOTAL</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
</div>
@endsection

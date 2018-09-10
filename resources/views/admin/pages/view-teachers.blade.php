@extends('admin.layout.auth')

@section('styles')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">

@endsection

@section('content')
	
@endsection

@section('left-nav')
    @include('admin.inc.left-nav')
@endsection
	
@section('window')
        @include('admin.inc.messages')
        <div class="panel panel-default">
            <div class="panel-body">
            @if(count($teachers)>0)
            <h4 class='text-center'>ALL TEACHERS</h4>
            <table  class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%"
            data-pagination="true" data-search="true" data-toggle="table">
                <thead class="thead-light">
                    <tr>
                    <th data-sortable="true" data-field="name" class="th-sm">NAME
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                    </th>
                    <th data-sortable="true" class="th-sm">ID NUMBER
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                    </th>
                    <th data-sortable="true" class="th-sm">EMAIL
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                    </th>
                    <th class="th-sm">ROLE
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                    </th>
                    <th class="th-sm">TELEPHONE
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                    </th>
                    
                    </th>
                    <th class="th-sm">EDIT
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                    </th>
                    <!-- <th class="th-sm">DELETE
                        <i class="fa fa-sort float-right" aria-hidden="true"></i>
                    </th> -->
                
                    </tr>
                </thead>
                <tbody class="">
                    
                @foreach($teachers as $teacher)
                    <tr>
                    <td>{{$teacher->name}}</td>
                    <td>{{$teacher->id_no}}</td>
                    <td>{{$teacher->email}}</td>
                    <td>
                        {{$teacher->role}} <br>
                        @if(count($teacher_heads)>0)
                            @foreach($teacher_heads as $teacher_head)
                                @if($teacher_head->id_no == $teacher_id_no)
                                    {{}}
                                @else

                                @endif
                            @endforeach
                     </td>
                    <td>{{$teacher->tel}}</td>
                

                    <td><a href="teachers/{{$teacher->id}}/edit" class='btn btn-sm btn-info'> <i class='glyphicon glyphicon-edit'></i> EDIT</a></td>
                    <td>
                    <!-- <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#myModal"> <i class='glyphicon glyphicon-remove'></i> DELETE</button> -->
                    
                
                    </td>
                </tr>
                @endforeach
                        
                </tbody>
                <tfoot>
                    <tr>
                    <th>Name</i>
                    </th>
                    <th>ID NO</i>
                    </th>
                    <th>EMAIL</i>
                    </th>
                    <th>ROLE</i>
                    </th>
                    <th>TEL</i>
                    </th>
                    </th>
                    <th>EDIT</i>
                    </th>
                    <!-- <th>DELETE</i>
                    </th> -->
                
                    
                    </tr>
                </tfoot>
                </table>
            @else
            <div class="alert alert-warning">
            <strong>No Teachers Records !</strong> 
            </div>
            @endif
            </div>
        </div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header alert-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body test-uppercase">
       PLEASE CONFIRM THAT YOU WANT TO <b>PERMANENTLY DELETE {{strtoupper($teacher->name)}}'S</b>  RECORDS ...!!
      </div>
      <div class="modal-footer">
      <table class="pull-right">
          <tr>
              <td>  <form action="{{route('teachers.destroy',$teacher->id)}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-danger btn-sm" type="submit"> <i class='glyphicon glyphicon-remove'></i> DELETE</button>
                    </form> 
                </td>
                
                <td>&nbsp;&nbsp;
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                </td>
          </tr>
      </table>
    
      </div>
    </div>

  </div>
</div>
<!-- //modal -->

@endsection

@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

<!-- Latest compiled and minified Locales -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-zh-CN.min.js"></script> -->

<script>

</script>
@endsection

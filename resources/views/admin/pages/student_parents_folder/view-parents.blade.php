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
 @if(count($parents)>0)
 <h4 class='text-center'>PARENTS RECORDS</h4>
 <div class="panel panel-default">
  <div class="panel-body">
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
                <!-- <th class="th-sm">
                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th> -->
                <th class="th-sm">TELEPHONE
                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                
                </th>
                <th class="th-sm">EDIT
                    <i class="fa fa-sort float-right" aria-hidden="true"></i>
                </th>
                </tr>
            </thead>
            <tbody class="">
                
            @foreach($parents as $parent)
                <tr>
                <td>{{$parent->name}}</td>
                <td>{{$parent->id_no}}</td>
                <td>{{$parent->email}}</td>
                <td>{{$parent->tel}}</td>
                <td><a href="{{route('std_parents.edit',[$parent->id])}}" class='btn btn-sm btn-info'> <i class='glyphicon glyphicon-edit'></i> EDIT</a></td>
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
                <!-- </th>
                <th>ROLE</i>
                </th> -->
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
        <strong>No parents Records !</strong> 
        </div>
        @endif
        </div>
    </div>

@endsection

@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

<!-- Latest compiled and minified Locales -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-zh-CN.min.js"></script> -->

<script>

</script>
@endsection

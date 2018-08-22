@extends('admin.layout.auth')

@section('styles')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.css">

@endsection

@section('content')
	@include('admin.inc.messages')
@endsection

@section('left-nav')
    @include('admin.inc.left-nav')
@endsection
	
@section('window')

 @if(count($teachers)>0)
 <h4>ALL Teachers</h4>
<table  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%"
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
        <th class="th-sm">TELEPHONE
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">ALT TEL
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        <th class="th-sm">ROLE
            <i class="fa fa-sort float-right" aria-hidden="true"></i>
        </th>
        
        </tr>
    </thead>
    <tbody>
        
    @foreach($teachers as $teacher)
        <tr>
        <td>{{$teacher->name}}</td>
        <td>{{$teacher->id_no}}</td>
        <td>{{$teacher->email}}</td>
        <td>{{$teacher->tel}}</td>
        <td>{{$teacher->alt_tel}}</td>
        <td>{{$teacher->role}}</td>
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
        <th>TEL</i>
        </th>
        <th>ALT TEL</i>
        </th>
        </th>
        <th>ROLE</i>
        </th>
        
        </tr>
    </tfoot>
    </table>
@else
<div class="alert alert-warning">
  <strong>No Teachers Records !</strong> 
</div>
@endif

@endsection

@section('scripts')
<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>

<!-- Latest compiled and minified Locales -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/locale/bootstrap-table-zh-CN.min.js"></script> -->

<script>

</script>
@endsection

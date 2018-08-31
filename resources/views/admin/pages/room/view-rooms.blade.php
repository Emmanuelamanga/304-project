@extends('admin.layout.auth')


@section('left-nav')
    @include('admin.inc.left-nav')
@endsection

@section('window')
    @include('admin.inc.messages')
	<h3 class="text-center">
		ALL CLASSES
	</h3>
	@if(count($rooms)>0)  
		@foreach($rooms as $room)
		<a href="#{{$room->ref_no}}" data-toggle="collapse" class="h3 btn btn-default">{{$room->class_name}}</a> 
        <div id="{{$room->ref_no}}" class="collapse">
        <table class="table table-bordered">
        <thead><th colspan="6" class="text-center h2">{{strtoupper($room->class_name)}}</th></thead>
            <thead>
            
                <th>REf NO.</th>
                <th>CLASS NAME</th>
                <th>CAPACITY</th>
                <th>CLASS TEACHER</th>
                <th>CREATED AT</th>
                <th>UPDATED AT</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{$room->ref_no}}</td> 
                    <td>{{$room->class_name}}</td>
                    <td>{{$room->class_capacity}}</td>
                    <td>{{$room->class_teacher}}</td>
                    <td>{{$room->created_at}}</td>
                    <td>{{$room->updated_at}}</td>
                </tr>
            </tbody>
            <tfoot>
               <tr> 
                <td colspan="2"></td>
                <td><a href="rooms/{{$room->id}}/edit" class="btn btn-info my-4 btn-block"> <i class="glyphicon glyphicon-eye-open"></i> EDIT</a></td>
                <td>
                <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#myModal"> <i class='glyphicon glyphicon-remove'></i> DELETE</button>
                
                </td>
               </tr> 
            </tfoot>
            </table>
        </div>
        <br>
		@endforeach
		
	@else

	@endif
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header alert-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body test-uppercase">
       PLEASE CONFIRM THAT YOU WANT TO <b>PERMANENTLY DELETE <span class="badge"> {{strtoupper($room->class_name)}} </span>CLASS</b>  RECORDS ...!!
      </div>
      <div class="modal-footer">
      <table class="pull-right">
          <tr>
              <td>  <form action="{{route('rooms.destroy',$room->id)}}" method="post">
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
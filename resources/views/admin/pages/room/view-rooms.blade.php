@extends('admin.layout.auth')


@section('left-nav')
    @include('admin.inc.left-nav')
@endsection

@section('window')
    @include('admin.inc.messages')
	<h3 class="text-center">
		ALL ROOMS
	</h3>


        <table class="table table-bordered">
	@if(count($rooms)>0)  
		@foreach($rooms as $room)

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
                    <td><a href="rooms/{{$room->id}}/edit" class="btn btn-info my-4 btn-block"> <i class="glyphicon glyphicon-eye-open"></i> EDIT</a></td>
                    <td><button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#myModal"> <i class='glyphicon glyphicon-remove'></i> DELETE</button></td>
                </tr>
            </tbody>
            <tfoot>
               <tr> 
                <td colspan="2"></td>
               
               </tr> 
            </tfoot>
            @endforeach
            </table>
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
                        <td>  
                        <form action="{{route('rooms.destroy',$room->id)}}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button class="btn btn-danger btn-sm" type="submit"> <i class='glyphicon glyphicon-remove'></i> DELETE</button>
                            </form> 
                            </td>
                            <td>&nbsp;&nbsp;
                                <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                            </td>
                    </tr>
                
                </div>
                </div>
            </div>
        
            <!-- //modal -->
                  </table>  
                @else
                <div class="alert alert-info alert-block">

            <button type="button" class="close" data-dismiss="alert"><a href="{{route('rooms.create')}}">×</a></button>	

            <strong>    NO ROOMS </strong>

            </div>
                @endif
         
        </div>
        <br>
  


@endsection
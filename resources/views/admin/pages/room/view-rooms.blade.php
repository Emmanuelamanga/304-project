@extends('admin.layout.auth')


@section('left-nav')
    @include('admin.inc.left-nav')
@endsection

@section('window')
@include('admin.inc.messages')
	<h3>
		All Classses
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
                <td><a href="#" class="btn btn-info">Edit</a></td>
                <td><a href="#" class="btn btn-danger">Delete</a> </td>
               </tr> 
            </tfoot>
            </table>
        </div>
        <br>
		@endforeach
		
	@else

	@endif

    

@endsection
@extends('admin.layout.auth')


@section('left-nav')
    @include('admin.inc.left-nav')
@endsection

@section('window')
    @include('admin.inc.messages')
<div class="panel panel-default">
    <div class="panel-heading h2 text-center">ALL CLASS ROOMS </div>
    <div class="panel-body">
            <!-- check room availability -->
        @if(count($rooms)>0)
            
            @foreach($rooms as $room)
                <table class="table table-bordered">
                    <thead>
                    <tr ><th class="text-center" colspan="5">{{$room->class_name}}</th></tr> 
                    
                        <th>Class Name</th>
                        <th>Class Teacher</th>
                        <th>Class Capacity</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>EDIT</th>
                    </thead>
                    <!-- check subrooms  availability -->
                    @if(count($sub_rooms)>0)                    
                        @foreach($sub_rooms as  $sub_room)
                        <!-- populate subrooms of current room -->
                            @if($room->room_ref == $sub_room->room_ref)
                            <tbody>
                                <tr>                            
                                    <td>{{$sub_room->sub_class_name}}</td>
                                    <td>{{$c_teacher->get_classTeacher($sub_room->class_teacher)->name}}</td>
                                    <td>{{$sub_room->class_capacity}}</td>
                                    <td>{{$sub_room->updated_at}}</td>
                                    <td>{{$sub_room->created_at}}</td>
                                    <td><a href="{{route('sub_room.show', [$sub_room->id])}}" class="btn btn-info btn-sm"> <span class="glyphicon glyphicon-edit"></span> EDIT</a></td>
                                </tr>
                            </tbody>   
                            @endif
                            
                        @endforeach
                    @else
                        no subrooms
                    @endif 
                     <!--end check sub rooms  -->
                </table>
            @endforeach
        @else
            no rooms
        @endif
    </div>
</div>   

@endsection
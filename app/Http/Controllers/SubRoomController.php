<?php

namespace App\Http\Controllers;

use App\SubRoom;
use App\RoomHead;
use Illuminate\Http\Request;
use App\Teacher;
use App\Room;
use App\teacher_subject;
use Illuminate\Support\Facades\DB;

class SubRoomController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware(['auth:admin']);
    }
    public $room_ref;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all the subrooms left join the rooms
        return $rooms_sub = DB::table('rooms')
                        ->leftjoin('sub_rooms','rooms.room_ref', '=' , 'sub_rooms.room_ref')
                        ->get();
            

    }

    // public function get_room(Request $request)
    // {
    //      $room_ref = $request->input('room_ref');

    //      $teachers = Teacher::where('defined_role', 0)->get();

    //     //  define sub-room ref
    //      $sub_room_ref = $room_ref.'/'.date('Y');

    //      //instance of class subject
    //      $room = new teacher_subject;

    //      return view('admin/pages/room/create-subroom')
    //             ->with('room_ref', $room_ref)
    //             ->with('teachers', $teachers)
    //             ->with('room', $room)
    //             ->with('sub_room_ref', $sub_room_ref);


    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
       
         $teachers = Teacher::where('defined_role', 0)->get();
 
         return view('admin.pages.room.create-subroom')
                    ->with('rooms',  Room::all())
                    ->with('teachers', $teachers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $this->validate($request,[
            'room_ref' => 'required',
            // 'sub_room_ref' => ' required |string |unique:sub_rooms',
            'class_name' => 'required|string|min:3',
            'class_capacity' => 'required|numeric',
            'class_teacher' => 'required|string|min:3'
            ]);

            // create room instance
            $room = new SubRoom;
                $room->room_ref = $request->input('room_ref');
                $room->sub_room_ref = $request->input('room_ref').'/'.random_int(0,500);
                $room->sub_class_name = $request->input('class_name');
                $room->class_capacity = $request->input('class_capacity');
                $room->class_teacher = $request->input('class_teacher');
            $room->save();

            // update teachers record 
            DB::table('teachers')
                    ->where('id_no',  $request->input('class_teacher'))
                    ->update(
                        [
                            'role' => 'Class Teacher',
                            'defined_role' => 1                       
                        ]);

            // insert record to  room heads
            DB::table('room_heads')->insert(
                [
                'id_no' => $request->get('class_teacher'),
                'room_ref' => $request->get('room_ref'),
                'active' => 1
                ]
            );

            // insert record into teacher room
            DB::table('teacher_room')->insert(
                [
                'id_no' => $request->get('class_teacher'),
                'room_ref' => $request->get('room_ref'),
                ]
            );


                return redirect()
                        ->route('rooms.index')
                        ->with('success','Sub Class Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubRoom  $subRoom
     * @return \Illuminate\Http\Response
     */
    public function show($subRoom)
    {
        // show sub room for editing 
     $subroom = SubRoom::find($subRoom);

    //  instance of room head
    $rm_name = new RoomHead;

    // instance of teacher
    $gt_teacher = new Teacher;

     return view('admin.pages.room.edit-subroom')
            ->with('rm_name', $rm_name)
            ->with('gt_teacher', $gt_teacher)
                ->with('subroom', $subroom)
                ->with('rooms', Room::all())
                ->with('teachers', Teacher::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubRoom  $subRoom
     * @return \Illuminate\Http\Response
     */
    public function edit($subRoom)
    {
        
         $room_ref = Room::find($subRoom);

         

        //  define sub-room ref
         $sub_room_ref = $room_ref->room_ref.'/'.date('Y').'/'.rand(2,500);

         //instance of class subject
         $room = new teacher_subject;

        //  get teachers not class teachers
        $teachers = Teacher::where('defined_role', 0)->get();

         return view('admin/pages/room/create-subroom')
                ->with('room_ref', $room_ref)
                ->with('teachers', $teachers)
                ->with('room', $room)
                ->with('sub_ref', $sub_room_ref);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubRoom  $subRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subRoom)
    {
        $this->validate($request,[
            'class_name' => 'required|string|min:3',
            'class_capacity' => 'required|numeric',
            'class_teacher' => 'required|string|min:3'
            ]);

            //update subroom
            SubRoom::where('id',$subRoom)
                        ->update([
                            'sub_class_name' => $request->input('class_name'),
                            'class_capacity' => $request->input('class_capacity'),
                            'class_teacher' => $request->input('class_teacher')
                            ]);

            // update teachers record 
            DB::table('teachers')
                    ->where('id_no',  $request->input('class_teacher'))
                    ->update(
                        [
                            'role' => 'Class Teacher',
                            'defined_role' => 1                       
                        ]);

            // insert record to  room heads
            DB::table('room_heads')
                ->where('id_no',  $request->input('class_teacher'))
                ->update(
                [
                'id_no' => $request->get('class_teacher'),
                'room_ref' => $request->get('room_ref'),
                'active' => 1
                ]
            );

            // insert record into teacher room
            DB::table('teacher_room')
            ->where('id_no',  $request->input('class_teacher'))
            ->update(
                [
                'id_no' => $request->get('class_teacher'),
                'room_ref' => $request->get('room_ref'),
                ]
            );


                return redirect()
                        ->route('rooms.index')
                        ->with('success','Sub Class Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubRoom  $subRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubRoom $subRoom)
    {
        //
    }
}

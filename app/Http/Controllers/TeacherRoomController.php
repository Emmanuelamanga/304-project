<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use App\Subject;
use App\Room;
use App\Teacher_room;
use App\teacher_subject;
use Auth;

use App;


class TeacherRoomController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // create room instance
        $room = new Room;

        // crete teachers instace
        // $tcher = new Teacher;
        
        // create subject instance
        $subject = new Subject;


        // fetch all teachers 
         $teachers = Teacher::all();

        // uses teacher_room table (contains teacher_id with room_ref)
        // $teacher_room = Teacher_subject::all();

        // uses 'teacher_subjects' table
        $teacher_subjects = Teacher_room::all();
        
    
        return view('admin/pages/room/teacher-room')
                // ->with('teacher_room', $teacher_room)
                ->with('subject', $subject)
                ->with('teachers', $teachers)
                ->with('teacher_subjects', $teacher_subjects) 
                ->with('room', $room);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $rooms = Room::all();
        
        return view('admin/pages/room/teacher-room-create')
                ->with('teachers',$teachers)
                ->with('subjects',$subjects)
                ->with('rooms',$rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        [
            'id_no' => 'required|numeric|digits_between:7,8',
            'ref_no' => 'required|array|min:1',
            'room_ref'     => 'required',
        ]);
        
        // set input ref_no to variable ref_no
        $ref_no = $request->input('ref_no');
        
        if (count($ref_no)>2) {

        return  redirect()
                ->back()
                ->with('warning', 'A Teacher is subject to At most Two Subjects Per class');
        
        }else {

            // check the if teacher has subject to room 
            $check =  Teacher_room::where('id_no' ,$request->get('id_no'))
                                ->where('room_ref' ,$request->get('room_ref'))
                                ->first();
           
            if ($check) {
                return  redirect()
                ->back()
                ->with('warning', 'A Teacher has subjects to that room');
        
            } else {
               
                // check whether the subject is allocated in the room
                foreach ($ref_no as $key => $value) {
                    if ( Teacher_room::where('ref_no' ,$value)
                    ->first()) {
                        return  redirect()
                            ->back()
                            ->with('warning', 'Room Has subject(s)');
                    }
                }

                // check if the teacher has limited subjects
                $count = Teacher_room::where('id_no', $request->get('id_no'))->count();
                if($count < 6){
                    // insert teacher room to db
                    DB::table('teacher_room')->insert(
                        [
                        'id_no' => $request->get('id_no'),
                        'room_ref' => $request->get('room_ref'),
                        ]
                    );
                    
                     // insert teacher subject in db
                     for ($i=0; $i < count($ref_no) ; $i++) { 
                        $ref = $ref_no[$i];
                        // echo $ref.'<br>';

                        Teacher_room::create([
                            // insert id for teacher
                            'id_no' => $request->get('id_no'),
                            // insert subject
                            'ref_no' => $ref,
                            // insert room
                            'room_ref' => $request->get('room_ref'),
                    ]);

                } 

                }else{
                    return  redirect()
                    ->back()
                    ->with('warning', 'Teacher has maximum number of lessons'); 
                }
                

                
            }          
        }
        
                
        return  redirect()
                ->route('teacherRoom.index')
                ->with('success', 'Record Inserted');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use App\Subject;
use App\Room;
use App\Teacher_room;
use Auth;

use App;


class TeacherRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get teachers records from db
        $teachers_r = Teacher_room::all();

        
        return view('admin/pages/room/teacher-room')
                ->with('teachers_r', $teachers_r);
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
            'id_no' => 'required',
            'ref_no' => 'required|array|min:1',
            'room_ref'     => 'required',
        ]);

        $ref_no = $request->input('ref_no');
        
        if (count($ref_no)>2) {

            return  redirect()->back()->with('warning', 'A Teacher is subject to At most Two Subjects Per class');
        
        }else {
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
        }
        
                
        return  redirect()->back()->with('success', 'Record Inserted');

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

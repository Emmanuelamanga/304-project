<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use App\Teacher_room;
use App\Teacher_subject;
use App\Room;
use App\Subject;
use App\Result;
use App\Student;
use App;
use Auth;

class EnterMarkscontroller extends Controller
{

           /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // fetch all the rooms allocated to the user from teacher_room table
        $rooms = Teacher_subject::where('id_no', Auth::user()->id_no)                            
                                    ->get(); 

        // check if there is rooms for teacher
        if (count($rooms)>0) {

            foreach ($rooms as $key => $room) {
               $rm[] = Room::where('room_ref', $room->room_ref)->first();
            }

            return view('teacher/marks/rooms')
                        ->with('rooms', $rm); 
        } else {
            
            // if no rooms set an empty set of rooms to throw an error
            return view('teacher/marks/rooms')
                        ->with('rooms', []);    
        }    
                  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'marks' => 'required'
        ]);
            //get the marks in an array
            $marks = $request->input('marks');
            // get room via session
            $room = session('room');

            // get subject via session
            $subject = session('subject'); 

            // get marks from the input as array
            $marks = $request->input('marks');

            // get admission nu8mber from input as array
            $adm_no = $request->input('adm_no');
            
            // loop through adm numbers 
            foreach($adm_no as $adm) {
                
                $result = Result::where('adm_no', $adm)->first();

                if ($adm == $result->adm_no) {

                //    echo 'match found';

                } else {

                // insert adm numbers 
                DB::insert('insert into results (adm_no) values (?)', array($adm));
                   
                }
                foreach($marks as $mark) {
                    // update results
                 DB::table('results')->where('adm_no', $adm)->update([session('subject') => $mark]);
                
                }
              
            }
            $request->session()->forget(['room','subject']);
        
                
        return redirect()->route('marks.create')->with('success', 'Marks Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // find the room
        $room = Room::find($id);

        // set  the room through session global helper...
        session(['room' => $room->room_ref]);

        // get subjects of the logged in teacher from the teacher_subject table
        $subjects = Teacher_room::where('id_no', Auth::user()->id_no)
                                ->where('room_ref', $room->room_ref)                             
                                ->get(); 

         // check if there is subjects for teacher
         if (count($subjects)>0) {

            foreach ($subjects as $key => $subject) {
               $rm[] = Subject::where('ref_no', $subject->ref_no)->first();
            }

            return view('teacher/marks/subject')
                        ->with('subjects', $rm); 
        } else {
            
            // if no subjects set an empty set of rooms to throw an error
            return view('teacher/marks/subject')
                        ->with('subjects', []);    
        }    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        // find the selected subject
        $subject = Subject::find($id);

         // Via the global helper...
         session(['subject' => $subject->subject_name]);


         $rooms =  Room::where('room_ref', session('room'))->get();

            if (count($rooms)>0) {
                foreach ($rooms as $key => $room) {
                    // set rooms in an array
                   $rms[] = Student::where('room', $room->class_name)->first();
                }

                return view('teacher/marks/enter-marks')
                // send array of students in that class
                        ->with('students', $rms)
                        // send current subject
                        ->with('subject', session('subject'))
                        // send current room
                        ->with('room', Room::where('room_ref', session('room'))->first());
            } else {
                
            }
            
      
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Teacher;
use App\Teacher_room;
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
        // get details of auth user 
        $room = DB::table('teacher_room')
                ->select('room_ref')
                ->where('id_no', Auth::user()->id_no)
                ->first();

        // get rooms
        if (Auth::user()->role == 'Class Teacher') {
            return view('teacher/marks/rooms')
                        ->with('rooms', Room::all());  
        }elseif(count($room)<1) {     

        return view('teacher/marks/rooms')
                        ->with('rooms', $room)
                        ->with('warning', 'NO ROOMS ALLOCATED');  
        } else {
           $rooms = Room::where('room_ref', $room->room_ref )->get();
           
            return view('teacher/marks/rooms')
                        ->with('rooms', $rooms);  
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

           


            //loop through the array as you update the results with the ids
           for ($i=0; $i < count($marks) ; $i++) {

            // $mark = $marks[$i];

                // Result::create([
                //     'adm_no' => $request->input('adm_no'),
                //     session('subject') =>  $request->input('marks')
                // ]);   

            } 

            $marks = $request->input('marks');
            $adm_no = $request->input('adm_no');

            foreach($adm_no as $adm) {
                
                $result = Result::where('adm_no', $adm)->first();

                if ($adm == $result->adm_no) {
                //    echo 'match found';
                } else {

                DB::insert('insert into results (adm_no) values (?)', array($adm));
                   
                }
                foreach($marks as $mark) {

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
    {       $room = Room::find($id);
        // Via the global helper...
        session(['room' => $room->room_ref]);
        
        return view('teacher/marks/subject')
                ->with('subjects', Subject::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::find($id);

         // Via the global helper...
         session(['subject' => $subject->subject_name]);
        
        return view('teacher/marks/enter-marks')
                ->with('students', Student::all());
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

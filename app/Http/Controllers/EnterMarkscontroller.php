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
        
            $rooms = Room::All();
           
            return view('teacher/marks/rooms')
                        ->with('rooms', $rooms);     
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
            // get column title
        $subject ;

            //loop through the aray as you fil the values
           for ($i=0; $i < count($marks) ; $i++) { 
               
                 $marks[$i];
                $request->input('adm_no');
            } 
     
        
                
        return ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('teacher/marks/subject')
                ->with('room', Room::find($id))
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
<?php

namespace App\Http\Controllers;

use App\Student;
use App\Room;
use App\SubRoom;
use App\studentParent;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('student');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $room = new Room;

        $subroom = new SubRoom;

        return view('admin.pages.students.view-students')
            ->with('students', Student::orderBy('created_at', 'DESC')->get())
            ->with('rooms', Room::all())
            ->with('subrooms', SubRoom::all())
            ->with('room', $room)
            ->with('subroom', $subroom);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        // get all the values of the students
            $students = Student::all();

          
        // record found
        if (count($students)>0) {
            // get last student adm_no
           $student = Student::latest()->first();

            // set the adm to next
             // increament any other regestered student reg number
           $adm = $student->adm_no+1;

        } else { 
            // set the first adm number to 1000
           $adm = 1000;
        }
        
       
        
        
        return view('admin.pages.students.register-student')
                        ->with('rooms', App\Room::all())
                        ->with('subrooms', SubRoom::all())
                        ->with('adm', $adm)
                        ->with('studentParent', studentParent::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $this->validate($request,[
            'name' => 'required | string | min:3',
            'email' => 'required | string | min:5',
            'admission_number'=> 'string',
            'date_of_birth' => 'required|date',
            'mainroom' => 'required',
            'sub_room' => 'required',
            'parent_id' => 'required|numeric',
        //  'password' => 'required|confirmed'
        ]);


            // insert values to database
        DB::table('students')->insert(
                    [
                    'name' => $request->input('name'), 
                    'email' => $request->input('email'),
                    'dob' => $request->input('date_of_birth'),
                    'room' => $request->input('mainroom'),
                    'subroom' => $request->input('sub_room'),
                    'adm_no'=> $request->input('admission_number'),
                    'password'=> bcrypt('dfjsdlksdjl'),
                    'id_parent'=> $request->input('parent_id'),
                    'results' => 0
                    ]
                );
                
            return redirect()->route('students.index')
                ->with('success','Student Record Added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $std = Student::find($student);
 
        return view('admin.pages.students.edit-student', 
                compact('student', $std))             
                ->with('rooms', App\Room::all())
                // ->with('student_parent', studentParent::where('id_no', $std->id_parent)->get())
                ->with('parents', studentParent::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}

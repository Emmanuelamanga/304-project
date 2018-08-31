<?php

namespace App\Http\Controllers;

use App\Student;
use App\Room;
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
        $this->middleware('admin');
        // $this->middleware('student');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.students.view-students')
            ->with('students', App\Student::orderBy('created_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.pages.students.register-student')
                    ->with('rooms', App\Room::all());
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
            'name' => 'required | alpha | min:3',
            'email' => 'required | string | min:5',
            'admission_number'=> 'required | string',
            'date_of_birth' => 'required',
            'student_class' => 'required',
            'parent_id' => 'required',
            'password' => 'required|confirmed'
        ]);


        DB::table('students')->insert(
                    [
                    'name' => $request->input('name'), 
                    'email' => $request->input('email'),
                    'dob' => $request->input('date_of_birth'),
                    'room' => $request->input('student_class'),
                    'adm_no'=> $request->input('admission_number'),
                    'password'=> bcrypt($request->input('password')),
                    'id_parent'=> $request->input('parent_id'),
                    'results' => 0
                    ]
                );

        //  DB::table('results')->insert(
        //             [
        //             'adm_no'=> $request->input('admission_number')
        //             ]
        //         );
                
                return redirect('admin/home')
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
        // $std = App\Student::find($student);
        $std = Student::where('id',$student)->get();
    
        return view('admin.pages.students.edit-student')
                ->with('student',$std);
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
        //
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

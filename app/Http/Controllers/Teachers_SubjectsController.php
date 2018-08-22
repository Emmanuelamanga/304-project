<?php

namespace App\Http\Controllers;

use App;

use App\Teacher;
use App\Teacher_subject;
use App\Subject;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Teachers_SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {

         $subjects = App\Subject::all();
        $teachers =App\Teacher::all();

        // $teachers_subjets = DB::table('teacher_subjects')
        //                     ->join('teachers', 'teacher_subjects.id_no', '=', 'teachers.id_no')
        //                     ->join('subjects', 'teacher_subjects.ref_no', '=', 'subjects.ref_no')
        //                     ->select('teacher_subjects.*', 'teachers.name', 'subjects.subject_name')
        //                     ->get();

        $teachers_subjects = DB::table('teacher_subjects')
                            ->leftJoin('teachers', 'teacher_subjects.id_no', '=', 'teachers.id_no')
                            ->get();
        // foreach ($teachers_subjects->ref_no as $key => $value) {
        //    $refs = $value;
        // }

        //  $subject_list = explode(', ',   $refs);

        return view('admin/pages/subjects/teachers-subjects')
                ->with('teachers_subjects',$teachers_subjects)
                ->with('subjects',$subjects)
                // ->with('subject_list',$subject_list)
                ->with('teachers', $teachers);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request, 
        [
            'id_no'=>'required|unique:teacher_subjects',
            // 'id_no'=>'required'
        ]);


        //inser to DB 
        $subject =new App\Teacher_subject;

            $subject_ids = count($request->input('subject_id')) ? $request->input('subject_id') : array();
            
            $subject->ref_no = count($subject_ids) ? implode(', ', $subject_ids) : ' ';
            $subject->id_no = $request->input('id_no');
            $subject-> save();

            // $id = App\Teacher_subject::all();

            // $teachers_names = DB::select('select * from teachers where id_no = ? ', [$id->id_no]);

       return redirect('admin/teachers_subjects')
                     ->with('success','subject created');        
      

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

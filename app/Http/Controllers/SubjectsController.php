<?php

namespace App\Http\Controllers;
use App;
use  App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.subjects.index') ->with('subjects',App\Subject::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.subjects.create')
       ;
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
                'ref_no'=>'required',
                'subject_name'=>'required'
            ]);

           
  

            $subject =new App\Subject;
            $subject->ref_no = $request->input('ref_no');
            $ref_no = $subject->subject_name=strtoupper($request->input('subject_name'));
            $subject-> save();
            
            // add subject name to the subject table
             DB::statement("ALTER TABLE results ADD $ref_no varchar(191) AFTER adm_no");

    
             return redirect('admin/subjects')
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

<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
use App\Student;
use App\Subject;
use App;
use Illuminate\Support\Facades\DB;


class ResultsController1 extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['teacher.guest'], ['except'=>'index','store']);
        // $this->middleware('student');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = App\Result::all();

        // $db_columns = APP\Subject::all();

        $columns = new Result;
        $db_columns = $columns->getTableColumns();
        
        return view('teacher.results.index')
                ->with('results', $results)
                ->with('db_columns', $db_columns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $subjects = Subject::all();

        return view('teacher.results.create')
                ->with('subjects', $subjects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $q1=implode(',', $request->input('marks'));

        return redirect()->back()
                    ->with('success',' Marks added ')
                    ->with('q1',$q1); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        $subjects = Subject::all(); 
        $students = Student::all(); 


        $subject_to_insert = Subject::find($result);

        return view('teacher.results.insert')
                ->with('subjects', $subjects)
                ->with('subject_to_insert', $subject_to_insert)
                ->with('students',$students);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        $results = App\Result::findOrFail($result);

        $student = App\Student::where('adm_no', $result->adm_no)->first();

        $columns = new Result;
        $db_columns = $columns->getTableColumns();

        return view('teacher.results.edit')
                ->with('results', $results)
                ->with('student',$student)
                ->with('db_columns',$db_columns);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {   
        return 'games over';

        // validation
        // $rules = array('required');

        // $validator = Validator::make(Input::all(), $rules);

        // if ($validator->fails())
        // {
        //     return Redirect()->back()->withErrors($validator);
        // }
// fetching the values from db
        // $results = App\Result::findOrFail($result);
       
        // $update_data = $request->all();

        // $results->fill($update_data)->save();

        // return redirect()->back()->with('success','Results Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $passport = App\Result::find($result);
        $passport->delete();

        return redirect('results')->with('success','Information has been  deleted');
    }
}

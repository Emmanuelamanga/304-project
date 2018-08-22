<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
use App\Student;
use App\Subject;
use App;
use Illuminate\Support\Facades\DB;


class ResultsController extends Controller
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
        $students = App\Student::all();

        $subjects = App\Subject::all();

        return view('teacher.results.create')
                ->with('subjects', $subjects)
                ->with('students',$students);
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
            'marks'=>'required',
            'subject_ref'=>'required',
            'comment' => 'required'
        ]);

            // fetch the subject name from the subject table same as the chosen subject
        $subject_name = App\Subject::where('ref_no', $request->input('subject_ref'))->first();


        // update the results table by inserting the subject marks
        DB::update('update  results set '.$subject_name->subject_name.'='.$request->input('marks').' where adm_no=?', [ $request->input('adm_no')]);


        return redirect()->back()->with('success',' Marks added '); 


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        // $results = App\Result::findOrFail($result);

        // $results = App\Result::where('id', $result)->first();


        $results = Result::where('id', '>', 1)->firstOrFail();

        return view('teacher.results.edit')
                ->with('results', $results);
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
        $this->validate($request, [
            'email' => 'required'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}

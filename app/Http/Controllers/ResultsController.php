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
        $this->middleware('auth:teacher');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //  fetch all students records from students table leftjoin with the results table
         $results = DB::table('students')
                        ->leftjoin('results','results.adm_no','=','students.adm_no')
                        ->get();
        
        // return view('results/index')
        //         ->with('results', $results);

                return $results;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $students = DB::table('students')
                            ->where('results', 0)
                            ->get();

        return view('results/create')
                ->with('students', $students);

        
        // // fetch records from students results table
        //  $results = Result::all();
        //     foreach ($results as $key => $value) {

        //         // $results2 =  Result::find($value->id);

        //         // fetch records from students results table
        //      $students = Student::where('adm_no', $value->adm_no)->get();

        //     }               

         // fetch all students records from students table
        //  $students = DB::table('students')
        //                 ->leftjoin('results','results.adm_no','=','students.adm_no')
        //                 ->get();

        // return view('results/create')
        //         ->with('students', $students);
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
         
        'math' => 'required | numeric | max:100',
        'eng' => 'required | numeric | max:100',
        'kiswahili' => 'required | numeric | max:100',
        'physics' => ' numeric | max:100',
        'biology' => ' numeric | max:100',
        'chemistry' => 'required | numeric | max:100',
        'cre' => 'numeric | max:100',     
        'history' => 'numeric | max:100', 
        'geography' => 'numeric | max:100', 
        'computer' => 'numeric | max:100', 
        'business' => 'numeric | max:100', 
        'agriculture' => 'numeric | max:100', 
        ]);

        Result::create($request->all());


        Student::where('adm_no', $request->input('adm_no'))
                 ->update(['results' => 1]);

    return redirect()->route('results.create')->with('success','results successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            // find student details
            $details = Student::findOrFail($id);

            return view('results/add')
                ->with('details', $details);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         // find student details
        //  $details = Student::findOrFail($id);

       $details = Result::findOrFail($id);

       $student = Student::where('adm_no',$details->adm_no)->get();

         //  fetch all students records from students table leftjoin with the results table
        //  $student = DB::table('students')
        //                 ->leftjoin('results','results.adm_no','=','students.adm_no')
                        
        //                 ->get();
        $columns = new Result;

        $db_columns = $columns->getTableColumns();
    

         return view('results.update')
             ->with('details', $details)
             ->with('student', $student)
             ->with('db_columns', $db_columns);
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
        $this->validate($request,
        [
         
        'math' => 'required | numeric | max:100',
        'eng' => 'required | numeric | max:100',
        'kiswahili' => 'required | numeric | max:100',
        'physics' => ' numeric | max:100',
        'biology' => ' numeric | max:100',
        'chemistry' => 'required | numeric | max:100',
        'cre' => 'numeric | max:100',     
        'history' => 'numeric | max:100', 
        'geography' => 'numeric | max:100', 
        'computer' => 'numeric | max:100', 
        'business' => 'numeric | max:100', 
        'agriculture' => 'numeric | max:100', 
        ]);

    //  Result::where('id', $id)
    //       ->update();

    $task = Result::findOrFail($id);

    $task->fill($request->all())->save();

    return redirect()->back()->with('success','results successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve the first model matching the query constraints...
        $data = Result::where('id', $id)->first();

        DB::table('students')->where('adm_no',  $data->adm_no)->update(['results'=> 0]); 
        
   
        
    DB::table('results')->where('id', $id)->delete();
       //  fetch all students records from students table leftjoin with the results table
       $results = DB::table('students')
                ->leftjoin('results','results.adm_no','=','students.adm_no')
                ->get();

        return redirect()->route('results.index')
                ->with('results', $results)
                    ->with('success','Results Deleted');   
 }
}

<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use App\Student;
use App\Result;
use Illuminate\Support\Facades\DB;
use PDF;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $results = Result::all();
        // $results = Student::all();
        // $results = DB::table('students')
        //         ->leftjoin('results','results.adm_no','=','students.adm_no')
        //         ->get();

        return view('reports/index');
                // ->with('students',$results);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = Student::all();
        $results = Student::all();
        if($request->view_type === 'download') {

            $pdf = PDF::loadView('reports.create', ['users' => $users]);

            return $pdf->download('users.pdf',['students'=>$result]);

        } else {
            $view = View('reports.create', ['users' => $users]);
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());
            return $pdf->stream();
        }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}

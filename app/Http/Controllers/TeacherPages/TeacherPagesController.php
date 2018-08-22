<?php

namespace App\Http\Controllers\TeacherPages;

use App\teacherPages;
use App\Subject;
use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeacherPagesController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['web']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = App\Subject::all();

        return view('teacher.home')->with('subjects', $subjects);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\teacherPages  $teacherPages
     * @return \Illuminate\Http\Response
     */
    public function show(teacherPages $teacherPages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\teacherPages  $teacherPages
     * @return \Illuminate\Http\Response
     */
    public function edit(teacherPages $teacherPages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\teacherPages  $teacherPages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teacherPages $teacherPages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\teacherPages  $teacherPages
     * @return \Illuminate\Http\Response
     */
    public function destroy(teacherPages $teacherPages)
    {
        //
    }
}

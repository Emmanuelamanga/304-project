<?php

namespace App\Http\Controllers;

use App\studentParent;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Student_ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.student_parents_folder.view-parents')
                ->with('parents', studentParent::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * loads the create parent view
     */
    public function create()
    {
        return view('admin.pages.student_parents_folder.create-parent');
    }

    /**
     * Store a newly created resource (student parent) in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation
        $this->validate($request,
        [
        'name' => 'required|max:255',
        'tel' => 'required|max:255',
        'id_no' => 'required|max:255',
        'email' => 'required|email|max:255|unique:student_parents',
         ]);

        // insert data to db
        DB::table('student_parents')->insert(
        [
        'name' => $request->input('name'), 
        'email' => $request->input('email'),
        'id_no' => $request->input('id_no'),
        'tel' => $request->input('tel'),
        ]
    );
     

    return redirect()->route('std_parents.index')
            ->with('success','Parent Record Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\studentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function show(studentParent $studentParent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\studentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parent = App\studentParent::find($id);

        return view('admin.pages.student_parents_folder.edit-parent')
                ->with('parent', $parent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\studentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $studentParent)
    {
        // validate input
        $this->validate($request,
        [
        'name' => 'required|max:255',
        'tel' => 'required|max:255',
        'id_no' => 'required|max:255',
        'email' => 'required|email|max:255',
         ]);
        // update record to db
         DB::table('student_parents')->where('id', $studentParent)
                    ->update(
                        [
                            'name'=>$request->name,
                            'tel'=>$request->tel,
                            'id_no'=>$request->id_no,
                            'email'=>$request->email                        
                        ]);
        // redirect to the view page
        return redirect()->route('std_parents.index')
                        ->with('success','Parent\'s Record Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\studentParent  $studentParent
     * @return \Illuminate\Http\Response
     */
    public function destroy(studentParent $studentParent)
    {
        // DB::table('')->where('id', $id)->delete();
        // return redirect()->back()->with('success','record deleted');
    }
}

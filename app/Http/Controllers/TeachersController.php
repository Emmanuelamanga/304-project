<?php

namespace App\Http\Controllers;
use App\Teacher;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.pages.view-teachers')
           ->with('teachers', App\Teacher::orderBy('created_at', 'DESC')->get());
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.pages.register-teacher');
       
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
            'name' => 'required|max:255',
            'tel' => 'required|max:255',
            'id_no' => 'required|max:255',
            'email' => 'required|email|max:255|unique:teachers',
            'password' => 'required|min:6|confirmed',
             ]);

    DB::table('teachers')->insert(
            [
            'name' => $request->input('name'), 
            'email' => $request->input('email'),
            'id_no' => $request->input('id_no'),
            'tel' => $request->input('tel'),
            'password' => bcrypt($request->input('password'))
            ]
        );

 // $teacher = new Teacher;

            // $teacher-> = $request->input('');

            // $teacher->save();
         

        return redirect('admin/home')
                ->with('success','Teacher Record Added');
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

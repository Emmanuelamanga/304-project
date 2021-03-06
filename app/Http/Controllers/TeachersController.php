<?php

namespace App\Http\Controllers;
use App\Teacher;
use App\Room;
use App\RoomHead;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeachersController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware(['auth:admin']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get class heads
        $teacher_head = RoomHead::all();

         return view('admin.pages.view-teachers')
            ->with('teacher_heads', $teacher_head)
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
            'name' => 'required|string',
            'tel' => 'required|max:10|regex:/^(07)[0-9]{8}/',
            'id_no' => 'required|numeric|digits_between:7,8',
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
         

        return redirect()->route('teachers.index')
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
        $teacher = Teacher::find($id);
        return view('admin.pages.edit-teacher', compact('teacher',$teacher))

                    ->with('rooms', Room::all());
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
            'name' => 'required|max:255',
            'tel' => 'required|max:10|regex:/^(07)[0-9]{8}/',
            'id_no' => 'required|numeric|digits_between:7,8',
            'email' => 'required|email|max:255',
            't_role' => 'required|max:255'
             ]);

             DB::table('teachers')->where('id', $id)
                        ->update(
                            [
                                'name'=>$request->name,
                                'tel'=>$request->tel,
                                'id_no'=>$request->id_no,
                                'email'=>$request->email,
                                'role'=>$request->t_role                                
                            ]);

            if ($request->t_role === 'Teacher') {
                // delete record from room_heads
                DB::table('room_heads')
                        ->where('id_no', $request->id_no)
                        ->delete();
                        
                // up[date column to 0
                DB::table('teachers')->where('id', $id)
                        ->update(
                            [
                                'defined_role'=> 0                                
                            ]);
            } else {
                DB::table('teachers')->where('id', $id)
                        ->update(
                            [
                                'defined_role'=> 1                               
                            ]);
            }


            if ($request->input('room') != null) {                  
                    if(DB::table('room_heads')->where('id_no', $request->id_no)->exists()){
                        return redirect()->route('teachers.index')
                            ->with('success','Teacher\'s Record Updated '.$request->name.' is a class teacher')
                            ->with('teachers', Teacher::orderBy('created_at', 'DESC')->get());

                    }else{
                       
                       DB::table('room_heads')->insert(
                            [
                            'id_no' =>  $request->id_no, 
                            'room_ref' => $request->input('room'),
                            'active' => 1    
                            ]
                        );  
                    }
                             
                        
            }
            

            return redirect()->route('teachers.index')
                            ->with('success','Teacher\'s Record Updated')
                            ->with('teachers', App\Teacher::orderBy('created_at', 'DESC')->get());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('teachers')->where('id', $id)->delete();
        return redirect()->back()->with('success','record deleted');
    }

        
}

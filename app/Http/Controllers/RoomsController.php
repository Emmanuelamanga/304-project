<?php
namespace App\Http\Controllers;

use App\Room;
use App\Teacher;
use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.room.view-rooms')
            ->with('rooms', Room::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $teachers = Teacher::where('role','Class Teacher')->get();

        // left join tables to get the values
      
        $teachers = Teacher::where('defined_role', 0)->get();

        return view('admin.pages.room.create-room')
        ->with('teachers', $teachers);
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
            'class_referance_number' => 'required|numeric',
            'class_name' => 'required|string|min:3',
            'class_capacity' => 'required|numeric',
            'class_teacher' => 'required|string|min:3'
            ]);
    
            $room = new Room;
                $room->room_ref = $request->input('class_referance_number');
                $room->class_name = $request->input('class_name');
                $room->class_capacity = $request->input('class_capacity');
                $room->class_teacher = $request->input('class_teacher');
            $room->save();

            DB::table('teachers')
                    ->where('id_no',  $request->input('class_teacher'))
                    ->update(
                        [
                            'role' => 'Class Teacher',
                            'defined_role' => 1                       
                        ]); 
            return redirect()->route('rooms.index')
                        ->with('success','Class Created');
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

        return view('admin.pages.room.edit-room')
            ->with('room', $room = Room::find($id))
            ->with('teachers',  Teacher::where('defined_role', 0)->get()) 
            ->with('current_teacher',Teacher::where('id_no',$room->class_teacher)->get())           
            ->with('roomx', Room::all());
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
        $this->validate($request,[
            'class_referance_number' => 'required|numeric',
            'class_name' => 'required|string|min:3',
            'class_capacity' => 'required|numeric',
            'class_teacher' => 'required|string|min:3'
            ]);


            DB::table('rooms')->where('id', $id)->update(
                    [
                        'room_ref'=>$request->class_referance_number,
                        'class_name'=>$request->class_name,
                        'class_capacity'=>$request->class_capacity,
                        'class_teacher'=>$request->class_teacher,
                        
                    ]);
            

         return redirect()->route('rooms.index')
                        ->with('success','Class Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('rooms')->where('id', $id)->delete();
        return redirect()->route('rooms.index')->with('success','Class Deleted');
    }
}

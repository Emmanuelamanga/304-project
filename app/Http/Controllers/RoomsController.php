<?php
namespace App\Http\Controllers;

use App\Room;
use App\Teacher;
use App;
use App\SubRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class RoomsController extends Controller
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
        $c_teacher = new Teacher;

        // rooms + sub_rooms
        // $rooms_sub = DB::table('rooms')
        //                 ->leftjoin('sub_rooms','rooms.room_ref', '=' , 'sub_rooms.room_ref')
        //                 ->get();

        // fetch all the rooms
        $rooms = Room::all();

        // fetch all the sub rooms
        $sub_rooms = SubRoom::all();

        return view('admin.pages.room.view-rooms')
            ->with('rooms', $rooms)
            ->with('sub_rooms', $sub_rooms)
            ->with('c_teacher',  $c_teacher);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get all the values of the rooms table
        $rooms = Room::all();

          
        // record found
        if (count($rooms)>0) {
            // get last student adm_no
           $room = Room::latest()->first();

            // set the adm to next
             // increament any other regestered student reg number
           $room_ref = $room->room_ref+1;

        } else { 
            // set the first adm number to 1000
           $room_ref = 1000;
        }
        
      
        $teachers = Teacher::where('defined_role', 0)->get();

        return view('admin.pages.room.create-room')
        ->with('teachers', $teachers)
        ->with('room_ref', $room_ref);
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
            'room_ref' => 'required|numeric',
            'class_name' => 'required|string|min:3',
            // 'class_capacity' => 'required|numeric',
            // 'class_teacher' => 'required|string|min:3'
            ]);
    
            $room = new Room;
                $room->room_ref = $request->input('room_ref');
                $room->class_name = $request->input('class_name');
                // $room->class_capacity = $request->input('class_capacity');
                // $room->class_teacher = $request->input('class_teacher');
            $room->save();

            DB::table('teachers')
                    ->where('id_no',  $request->input('class_teacher'))
                    ->update(
                        [
                            'role' => 'Class Teacher',
                            'defined_role' => 1                       
                        ]); 

            return redirect()->route('rooms.index')
                        ->with('success','Index Class Created');
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
            // 'class_capacity' => 'required|numeric',
            // 'class_teacher' => 'required|string|min:3'
            ]);


            DB::table('rooms')->where('id', $id)->update(
                    [
                        'room_ref'=>$request->class_referance_number,
                        'class_name'=>$request->class_name,
                        'class_capacity'=>$request->class_capacity,
                        // 'class_teacher'=>$request->class_teacher,
                        
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

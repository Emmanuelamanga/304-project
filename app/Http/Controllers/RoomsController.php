<?php
namespace App\Http\Controllers;

use App\Room;
use App\Teacher;
use App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.room.view-rooms')->with('rooms', App\Room::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.room.create-room')
        ->with('teachers', App\Teacher::all());
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
    
            $room->ref_no = $request->input('class_referance_number');
            $room->class_name = $request->input('class_name');
            $room->class_capacity = $request->input('class_capacity');
            $room->class_teacher = $request->input('class_teacher');
            $room->save();
            
            return redirect('admin/home')
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
            ->with('room', Room::find($id))
            ->with('teachers', Teacher::all())            
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

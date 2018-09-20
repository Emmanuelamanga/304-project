<?php

namespace App;
// use DB;
use Illuminate\Support\Facades\DB;
use App\Room;
use Illuminate\Database\Eloquent\Model;

class teacher_subject extends Model
{
    protected $table = 'teacher_room';

    // get rooms
    // public function get_room($room_ref){

    //    return  Room::where('room_ref', $room_ref)->first();

    // }

    // get subjects
    public function get_subject($sub){

        return  Subject::where('ref_no', $sub)->first(); 
      
     }
}

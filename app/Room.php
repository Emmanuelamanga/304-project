<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Room extends Model
{
    //defining variables 
	protected $table = "rooms";

	// defining class student relationship
    // public function student()
    // {
    // 	return $this->hasMany('App\Student');
    // }

    // get rooms
    public function get_room($room_ref){

    return $room =   Room::where('room_ref', $room_ref)->first();

        
    }
   
}

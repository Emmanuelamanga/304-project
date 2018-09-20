<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubRoom extends Model
{
    protected $table = "sub_rooms";

    public function get_subroom($sub_room_ref){

        return $subroom =   SubRoom::where('sub_room_ref', $sub_room_ref)->first();
    
            
        }
}

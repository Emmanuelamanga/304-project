<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;


class RoomHead extends Model
{
    protected $tabel = "room_heads";

    public function room_name($room_ref){

        return Room::where('room_ref', $room_ref)->first();
    }
}

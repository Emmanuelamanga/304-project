<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //defining variables 
	protected $table = "rooms";

	// defining class student relationship
    public function student()
    {
    	return $this->hasMany('App\Student');
    }
}

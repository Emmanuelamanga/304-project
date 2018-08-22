<?php

namespace App;
use App\Teacher;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    public function teacher(){

        $this->hasMany('App\Teacher');
        
    }
}

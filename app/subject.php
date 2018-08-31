<?php

namespace App;
use App\Teacher;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{

    protected $table = 'subjects';
    
    public function teacher(){

        $this->hasMany('App\Teacher');
        
    }
}

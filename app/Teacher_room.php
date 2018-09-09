<?php

namespace App;

use App\Notifications\TeacherResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Teacher_room extends Authenticatable
{
    protected $table = 'teacher_subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $fillable = [
        'id_no', 'ref_no','room_ref'
    ];
    



}

<?php

namespace App;

use App\Notifications\TeacherResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Authenticatable
{
    use Notifiable;
    protected $table = 'teachers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_no','tel',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new TeacherResetPassword($token));
    }

    public function subject(){

        $this->hasMany('App\Subject');
    }

    public function room(){

        $this->hasOne('App\Room');
    }

  
    // Auth::logout();

     // get class teacher
     public function get_classTeacher($id_no){

        return Teacher::where('id_no', $id_no)->first();
    }
   

}

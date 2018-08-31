<?php

namespace App;

use App\Notifications\StudentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','dob','room','adm_no','id_parent',
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
        $this->notify(new StudentResetPassword($token));
    }

//     public function results(){
// // student relation to results one to many
//         return $this->hasMany('App\Result', 'adm_no');

//     }

    public function result(){

        $this->hasOne('App\Result','adm_no');
    }
}

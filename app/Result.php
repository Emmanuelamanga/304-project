<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use Notifiable; 

    protected $table = "results";

    protected $fillable = ['adm_no','math', 'eng','kiswahili','physics','biology','chemistry','cre','history','geography','computer','business','agriculture'];
    
    public function getTableColumns() {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        
    }

    // public function students()
    // {
    //     return $this->belongsTo('App\Student','adm_no');
    // }

   
}

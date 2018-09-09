<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Result extends Model
{
    use Notifiable; 
    protected $guard = "teacher";

    protected $table = "results";

    protected $fillable = ['adm_no','math', 'eng','kiswahili','physics','biology','chemistry','cre','history','geography','computer','business','agriculture'];
    
    public function getTableColumns() {

        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        
    }
    public function grade($grade)
    {
        switch ($grade) {

            case ($grade>89):
                return 'A';
                break;
            case ($grade>74):
                return 'A-';
                break;
            case ($grade>69):
                return 'B+';
                break;
            case ($grade>64):
                return 'B';
                break;
            case ($grade>59):
                return 'B-';
                break;
            case ($grade>54):
                return 'C+';
                break;
            case ($grade>49):
                return 'C';
                break;
            case ($grade>44):
                return 'C-';
                break;
            case ($grade>39):
                return 'D+';
                break;
            case ($grade>34):
                return 'D';
                break;
            case ($grade>29):
                return 'D-';
                break;
            default:
                return 'E';
                break;
        }

    }
    public function remarks($grade)
    {
        if($grade === 'A' || $grade === 'A-')
            {
                return 'Excellent';
            }
        elseif($grade === 'B+' || $grade === 'B')
            {
                return 'Very Good';
             } 
         elseif($grade === 'B-' || $grade === 'C+')
            {
                return 'Good Work';
            }
        elseif($grade === 'C')
            {
                return 'Average';
            }
        elseif ($grade === 'C-') 
            {
                return 'Fair';
            }
        elseif($grade === 'D+')
            {
                return 'Below Average';
            }
        elseif ($grade==='D' || $grade==='D-') 
        {
                return '<i style="color:#8000ff"><b>Poor</b></i>';
            }
        else {
                return'<i style="color:red"><b>Fail</b></i>';
        }
    }

    // public function students()
    // {
    //     return $this->belongsTo('App\Student','adm_no');
    // }

   
}

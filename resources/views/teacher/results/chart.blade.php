
<?php

use Khill\Lavacharts\Lavacharts;
use App\Result;
use Illuminate\Support\Facades\DB;

$lava = new Lavacharts; // See note below for Laravel

$finances = $lava->DataTable();

//    $avg_marks = DB::table('results')
//                         ->where('',)
//                         ->avg('marks');

        // $s_names = DB::table('subjects')
        //                 ->where('subject_name', $value->subject_name)
        //                 ->get();

    // $titles = DB::table('results')->pluck();
//  $sum_marks = DB::table('results')->sum($value);
$finances->addStringColumn('Subjects')->addNumberColumn('Average');

// check if columns are set
if (count($db_columns)>0) {
// loop through the column names 
    foreach ($db_columns as  $key => $value) {
        //filter out unrequired  column names fron the column array
        if ($key != 0 && $key != 1 && ($key != count($db_columns)-1) && ($key != (count($db_columns)-2)) && ($key != (count($db_columns)-3)) ) {

            // find average of marks by columns 
         $query = DB::table('results')->select($value)->avg($value);
        
            // insert column names and marks to chart
         $finances->addRow([$value, $query]);
        }
        // increament the key of the column array
        $key++;
    }
    

}
    

$lava->ColumnChart('Finances', $finances, 
                        [
                        // 'title' => 'CLASS SUBJECTS PERFORMANCE',
                        'titleTextStyle' => [
                            'color'    => 'rgb(123, 65, 89)',
                            'fontSize' => 18
                        ],
                        'legend' => [
                            'position' => 'out'
                        ],
                        'seriesType' => 'bars',
                        'series' => [
                            2 => ['type' => 'line']
                        ]
]);

?>
@extends('teacher.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center h4 text-uppercase">Class Subjects Performance</div>
                <div class="panel-body">
                <div  id="perf_div"></div>
                </div>
            </div>
        </div>
    </div>
</div><?= $lava->render('ColumnChart', 'Finances', 'perf_div') ?>
@endsection




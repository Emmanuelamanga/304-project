
<?php

use Khill\Lavacharts\Lavacharts;

$lava = new Lavacharts; // See note below for Laravel

$temperatures = $lava->DataTable();

$temperatures->addStringColumn('Subjects')
             ->addNumberColumn('Marks')
             ->addRow(['MATH',  $details->math])
             ->addRow(['ENG',  $details->eng])
             ->addRow(['KISWAHILI',  $details->kiswahili])
             ->addRow(['PHYSICS',  $details->physics])
             ->addRow(['BIOLOGY',  $details->biology])
             ->addRow(['CHEMISTRY',  $details->chemistry])
             ->addRow(['CRE',  $details->CRE])
             ->addRow(['HISTORY',  $details->history])
             ->addRow(['GEOGRAPHY',  $details->geography])
             ->addRow(['COMPUTER', $details->computer])
             ->addRow(['BUSINESS', $details->business])
             ->addRow(['AGRICULTURE', $details->agriculture]);
             
$lava->LineChart('Temps', $temperatures, [
    'title' => 'STUDENT PERFORMANCE CURVE'
]);

?>
<div id="Marks_div"></div>
                     <!-- // With the lava object -->
    <?= $lava->render('LineChart', 'Temps', 'Marks_div') ?>
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adm_no')->unique();
            // $table->string('ref_no');
            // $table->string('marks');
            $table->string('math');
            $table->string('eng');
            $table->string('kiswahili');
            $table->string('physics');
            $table->string('biology');
            $table->string('chemistry');
            $table->string('C.R.E');
            $table->string('history');
            $table->string('computer');
            $table->string('business');
            $table->string('agriculture');
            $table->string('geography');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}

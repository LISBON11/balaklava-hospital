<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('procedure_date');
            $table->string('procedure_name');
            $table->string('procedure_description')->nullable();
            $table->string('paths_to_files')->nullable();


            $table->integer('inpatient_id')->unsigned();
            $table->integer('doctor_id')->unsigned();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('procedures',function (Blueprint $table){
            $table->foreign('inpatient_id')->references('id')->on('inpatients')
                ->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('health_workers')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('procedures');
    }
}

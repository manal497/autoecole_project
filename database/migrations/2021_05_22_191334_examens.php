<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Examens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->bigIncrements('id_examen');
            $table->date('date_examen');
            $table->datetime('heure_examen');
            $table->string('duree_examen');
            $table->timestamps();
        });//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::dropIfExists('examens');//
    }
}

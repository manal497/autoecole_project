<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Assister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assister', function (Blueprint $table) {
            $table->bigIncrements('id_assister');
            $table->string('cin_candidat');
            $table->foreign('cin_candidat')
                ->references('cin_candidat')
                ->on('candidats')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->unsignedBigInteger('id_seance');
            $table->foreign('id_seance')
                ->references('id_seance')
                ->on('seances')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('assister');//
    }
}

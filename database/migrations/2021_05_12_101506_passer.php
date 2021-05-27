<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Passer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passErexams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cin_candidat');
            $table->foreign('cin_candidat')
                ->references('cin_candidat')
                ->on('candidats')
                ->onDelete('cascade')
                ->onUpdate('cascade');

                $table->unsignedBigInteger('id_examen');
                $table->foreign('id_examen')
                    ->references('id_examen')
                    ->on('examens')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

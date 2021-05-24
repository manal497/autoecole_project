<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Affecter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->bigIncrements('id_affectation');

            $table->string('matricule');
            $table->foreign('matricule')
                ->references('matricule')
                ->on('parkings')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('cin_moniteur');
            $table->foreign('cin_moniteur')
                ->references('cin_moniteur')
                ->on('moniteurs')
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
        Schema::dropIfExists('affectations');//
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rendezvous extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rendezvous', function (Blueprint $table) {
            $table->bigIncrements('id_rdv');
            $table->date('date_rdv');
            $table->dateTime('heure_rdv');
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
        Schema::dropIfExists('rendezvous'); //
    }
}

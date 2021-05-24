<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id_reservation');
            $table->double('montant_payee');
            $table->date('date_reservation');
            $table->string('periode');

            $table->string('cin_candidat');
            $table->foreign('cin_candidat')
                    ->references('cin_candidat')
                    ->on('candidats')
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
        Schema::dropIfExists('reservations');//
    }
}

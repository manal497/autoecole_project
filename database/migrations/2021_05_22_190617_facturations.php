<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Facturations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturations', function (Blueprint $table) {
            $table->bigIncrements('id_fact');
            $table->date('date_fact');
            $table->double('montant_paye');
            $table->double('reste');
            
            $table->unsignedBigInteger('id_reservation');
                $table->foreign('id_reservation')
                    ->references('id_reservation')
                    ->on('reservations')
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
        Schema::dropIfExists('facturations'); //
    }
}

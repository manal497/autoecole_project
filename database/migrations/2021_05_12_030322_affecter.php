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
            $table->unsignedBigInteger('id_vehicule');
            $table->foreign('id_vehicule')
                ->references('id_vehicule')
                ->on('parkings')
                ->onDelete('cascade')
                ->onUpdate('cascade');
      
                $table->unsignedBigInteger('id_moniteur');
                $table->foreign('id_moniteur')
                    ->references('id')
                    ->on('moniteurs')
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
        Schema::dropIfExists('affectations');
    }
}

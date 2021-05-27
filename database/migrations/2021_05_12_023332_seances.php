<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Seances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {
            $table->bigIncrements('id_seance');
            $table->string('type_seance');

            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->time('jour');
              
            $table->unsignedBigInteger('id_moniteur');
            $table->foreign('id_moniteur')
                ->references('id_moniteur')
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
        Schema::dropIfExists('seances');
    }
}

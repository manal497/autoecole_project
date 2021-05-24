<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sceances extends Migration
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
            $table->string('duree');
            $table->string('effectuer')->default('non');
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
        Schema::dropIfExists('seances');//
    }
}

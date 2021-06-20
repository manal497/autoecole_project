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
        Schema::create('assisters', function (Blueprint $table) {
            $table->bigIncrements('id');
        $table->string('effectuee')->default('Non');
            $table->unsignedBigInteger('candidat_id');
            $table->foreign('candidat_id')
                ->references('id')
                ->on('candidats')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->unsignedBigInteger('seance_id');
            $table->foreign('seance_id')
                ->references('id')
                ->on('seances')
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
        Schema::dropIfExists('assisters');
    }
}

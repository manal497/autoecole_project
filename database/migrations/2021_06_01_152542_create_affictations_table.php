<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffictationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affectations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('vehicule_id');
            $table->foreign('vehicule_id')
                ->references('id')
                ->on('vehicules')
                ->onDelete('cascade')
                ->onUpdate('cascade');
      
            $table->unsignedBigInteger('moniteur_id');
            $table->foreign('moniteur_id')
                    ->references('id')
                    ->on('moniteurs')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');


            $table->dateTime('date_affectation');

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

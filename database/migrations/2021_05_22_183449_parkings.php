<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Parkings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkings', function (Blueprint $table) {
            $table->string('matricule')->primary();
            $table->string('type_véhicule');
            $table->string('marque');
            $table->string('etat')->default('interne');
            $table->timestamps();
        }); //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parkings');//
    }
}

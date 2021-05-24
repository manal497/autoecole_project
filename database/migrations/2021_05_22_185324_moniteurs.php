<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Moniteurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moniteurs', function (Blueprint $table) {
            $table->string('cin_moniteur')->primary();
            $table->string('nom');
            $table->string('prenom');
            $table->text('adresse');
            $table->string('telephone');
            $table->date('date_naissance');
            $table->string('numero_permis');
            $table->string('type_moniteur');
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
        Schema::dropIfExists('moniteurs'); //
    }
}

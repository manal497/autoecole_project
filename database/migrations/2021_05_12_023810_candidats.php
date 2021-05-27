<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Candidats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
    Schema::create('candidats', function (Blueprint $table) {
       
        $table->string('cin_candidat')->primary();
        $table->string('nom');
        $table->string('prenom');
        $table->text('adresse')->nullable();
        $table->string('telephone');
        $table->date('date_naissance')->nullable();
        $table->string('lieu_naissance')->nullable();
        $table->string('type_permis')->nullable();
        $table->string('sexe')->nullable();
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
    Schema::dropIfExists('candidats');
}
}

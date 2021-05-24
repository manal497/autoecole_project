<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Condidats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->string('cin_candidat')->primary();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->text('adresse');
            $table->string('telephone');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
           
            $table->string('type_permis');
          
            
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
        Schema::dropIfExists('candidats'); //
    }
}

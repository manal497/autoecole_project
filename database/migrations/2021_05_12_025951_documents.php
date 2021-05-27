<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Documents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id_dossier');
       
            $table->string('carte_recto')->nullable();
            $table->string('carte_verso')->nullable();
            $table->string('certificat_medical')->nullable();
            $table->string('photo')->nullable();
            $table->string('permis')->nullable();
            $table->string('attestation_fin_formation')->nullable();
            $table->string('recu_paiement')->nullable();
            $table->string('demmande_etablit')->nullable();

            $table->string('cin_candidat');
            $table->foreign('cin_candidat')
                ->references('cin_candidat')
                ->on('candidats')
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
        Schema::dropIfExists('documents');
    }
}

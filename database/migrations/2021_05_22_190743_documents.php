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
       
            $table->binary('carte_recto');
            $table->binary('carte_verso');
            $table->binary('certificat_medical');
            $table->binary('photo');
            $table->binary('permis');
            $table->binary('attestation_fin_formation');
            $table->binary('recu_paiement');
            $table->binary('demmande_etablit');


            $table->string('cin_candidat');
            $table->foreign('cin_candidat')
                ->references('cin_candidat')
                ->on('candidats')
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
        Schema::dropIfExists('documents');//
    }
}

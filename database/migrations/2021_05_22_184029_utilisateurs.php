<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Utilisateurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->string('cin')->primary();
            $table->string('nom');
            $table->string('prenom');
            $table->string('password');
            $table->string('email');
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')
                ->references('id_role')
                ->on('roleusers')
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
        schema::dropIfExists('utilisateurs');//
    }
}

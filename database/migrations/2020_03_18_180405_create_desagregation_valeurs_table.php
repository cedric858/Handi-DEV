<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesagregationValeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desagregation_valeurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('valeur_indicateur_id');
            $table->integer('nbrHandicapeMoteur')->nullable();
            $table->integer('nbrHandicapeVisuel')->nullable();
            $table->integer('nbrHandicapeAuditif')->nullable();
            $table->integer('nbrHandicapeMental')->nullable();
            $table->integer('nbrHomme')->nullable();
            $table->integer('nbrFemme')->nullable();
            $table->integer('nbrBoucleMouhoun')->nullable();
            $table->integer('nbrCascade')->nullable();
            $table->integer('nbrCentre')->nullable();
            $table->integer('nbrCentreEst')->nullable();
            $table->integer('nbrCentreNord')->nullable();
            $table->integer('nbrCentreOuest')->nullable();
            $table->integer('nbrCentreSud')->nullable();
            $table->integer('nbrHautsBassin')->nullable();
            $table->integer('nbrNord')->nullable();
            $table->integer('nbrSahel')->nullable();
            $table->integer('nbrSudOuest')->nullable();
            $table->integer('nbr05')->nullable();
            $table->integer('nbr610')->nullable();
            $table->integer('nbr1115')->nullable();
            $table->integer('nbr1620')->nullable();
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
        Schema::dropIfExists('desagregation_valeurs');
    }
}

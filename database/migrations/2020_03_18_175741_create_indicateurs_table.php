<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicateurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('domaine_id');
            $table->text('libelle');            
            $table->text('definition');
            $table->text('objectif');
            $table->text('calcul');
            $table->text('source');
            $table->integer('periodicite');
            $table->boolean('socioDemo')->nullable();
            $table->boolean('montantDepense')->nullable();
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
        Schema::dropIfExists('indicateurs');
    }
}

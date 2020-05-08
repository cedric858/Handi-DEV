<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValeurIndicateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valeur_indicateurs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('indicateur_id');
            $table->float('valeur');
            $table->boolean('pourcentage')->nullable();
            $table->float('ancienneValeur');
            $table->integer('annee');
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
        Schema::dropIfExists('valeur_indicateurs');
    }
}

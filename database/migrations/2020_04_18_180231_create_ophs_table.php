<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ophs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->string('nom');
            $table->string('sigle');
            $table->string('type');
            $table->timestamp('dateCreation');
            $table->string('numbRecipisse');
            $table->text('statut');
            $table->integer('nbrAdherantHomme');
            $table->integer('nbrAdherantFemme');
            $table->integer('nbrMembreHomme');
            $table->integer('nbrFemmeHomme');
            $table->unsignedBigInteger('type_handicap_id');
            $table->unsignedBigInteger('responsable_id');
            $table->integer('nbrMembreAlphabetise');
            $table->integer('nbrMembreScolarise');
            $table->integer('langue_id');
            $table->text('beneficiaire');
            $table->text('activite');
            $table->text('sourceFinancement');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('ophs');
    }
}

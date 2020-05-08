<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DesagregationValeurTypeDesagregationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desagregation_valeur_type_desagregation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('desagregation_valeur_id');
            $table->bigInteger('type_desagregation_id');
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
        //
    }
}

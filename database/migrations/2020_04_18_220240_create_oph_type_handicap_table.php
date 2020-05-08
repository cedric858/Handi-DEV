<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOphTypeHandicapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oph_type_handicap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('oph_id');
            $table->bigInteger('type_handicap_id');
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
        Schema::dropIfExists('oph_type_handicap');
    }
}

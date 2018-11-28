<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentInterfaceTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for instrument mapping
        Schema::create('instrument_mappings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('instrument_id')->unsigned();
            $table->integer('test_type_id')->unsigned();

            $table->foreign('instrument_id')->references('id')->on('instruments');
            $table->foreign('test_type_id')->references('id')->on('test_types');
        });

        Schema::create('instrument_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('instrument_mapping_id')->unsigned();
            $table->integer('measure_id')->unsigned();
            $table->string('sub_test_id');

            $table->foreign('instrument_mapping_id')->references('id')->on('instrument_mappings');
            $table->foreign('measure_id')->references('id')->on('measures');
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
        Schema::dropIfExists('instrument_mappings');
        Schema::dropIfExists('instrument_parameters');
    }
}

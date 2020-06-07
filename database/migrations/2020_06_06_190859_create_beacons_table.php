<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeaconsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beacons', function (Blueprint $table) {

            $table->uuid("beacon_uuid")->primary();
            $table->string("name");
            $table->foreignId('location_id')->unsigned();
            $table->foreignId('manufacturer_id')->unsigned();
            $table->foreignId('status_id')->unsigned();
            $table->timestamps();


            $table->foreign('location_id')->references('location_id')->on('locations');
            $table->foreign('status_id')->references('status_id')->on('statuses');
            $table->foreign('manufacturer_id')->references('manufacturer_id')->on('manufacturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beacons');
    }
}

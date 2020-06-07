<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id('asset_id');

            //foreign keys
            $table->foreignId("manufacturer_id");
            $table->foreignId("vendor_id");
            $table->foreignId("category_id");
            $table->foreignId("status_id");
            $table->foreignId("size_id");
            $table->foreignId("condition_id");
            $table->foreignId("assigned_location");
            $table->foreignId("current_location");
            $table->uuid("beacon_uuid");

            //attributes
            $table->string('name');
            $table->longText('description');
            $table->decimal("value", 10, 3);
            $table->dateTime("date_purchased");
            $table->dateTime("date_last_checked");


            //foreign key references
            $table->foreign('manufacturer_id')->references('manufacturer_id')->on('manufacturers');
            $table->foreign('vendor_id')->references('vendor_id')->on('vendors');
            $table->foreign('category_id')->references('category_id')->on('categories');
            $table->foreign('status_id')->references('status_id')->on('statuses');
            $table->foreign('size_id')->references('size_id')->on('sizes');
            $table->foreign('condition_id')->references('condition_id')->on('conditions');
            $table->foreign('assigned_location')->references('location_id')->on('locations');
            $table->foreign('current_location')->references('location_id')->on('locations');
            $table->foreign('beacon_uuid')->references('beacon_uuid')->on('beacons');

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
        Schema::dropIfExists('assets');
    }
}

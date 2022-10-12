<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('et_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('vendor_id');
            $table->integer('owner_id');
            $table->integer('route_id');
            $table->string('bus_no',50);
            $table->string('fitness',150);
            $table->string('tax_token',100);
            $table->string('documents',150);
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('road_permit')->default('1');
            $table->string('created_by',50);
            $table->string('updated_by',50);
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
        Schema::dropIfExists('et_vehicles');
    }
}

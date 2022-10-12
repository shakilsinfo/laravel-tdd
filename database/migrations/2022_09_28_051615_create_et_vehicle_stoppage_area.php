<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtVehicleStoppageArea extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('et_vehicle_stoppage_area', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('vendor_id');
            $table->integer('route_id');
            $table->string('stoppage_code',50);
            $table->string('stoppage_name',50);
            $table->decimal('km_distance',8,2);
            $table->tinyInteger('status')->default('1');
            $table->tinyInteger('route_type')->comment('1=up,2=down');
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
        Schema::dropIfExists('et_vehicle_stoppage_area');
    }
}

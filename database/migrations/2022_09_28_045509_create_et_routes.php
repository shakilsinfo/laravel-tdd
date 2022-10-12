<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtRoutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('et_routes', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('route_name',80);
            
            $table->integer('vendor_id');
            $table->integer('total_vehicles');
            $table->decimal('total_destination_km',8,2);
            $table->string('route_location',155);
            $table->tinyInteger('is_permit')->default('1');
            $table->tinyInteger('vehicle_type')->default('1');
            $table->string('created_by',50);
            $table->string('updated_by',50);
            $table->timestamps();
            $table->index(['vendor_id', 'route_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('et_routes');
    }
}

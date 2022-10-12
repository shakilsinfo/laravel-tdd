<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtTicketSale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('et_ticket_sales', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('vendor_id');
            $table->integer('owner_id');
            $table->integer('route_id');
            $table->string('journey_start_place',50);
            $table->string('journey_end_place',150);
            $table->string('issued_by',1)->comment('vehicle registration id');
            $table->string('vehicle_id',20)->comment('number plate id');
            $table->integer('serial_no');
            $table->decimal('fare_per_km',8,2);
            $table->decimal('total_km',8,2);
            $table->decimal('total_fare',8,2);
            $table->tinyInteger('special_fare')->default('0')->comment('1=yes,0=no');
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
        Schema::dropIfExists('et_ticket_sale');
    }
}

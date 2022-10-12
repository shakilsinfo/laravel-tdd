<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtFareSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('et_fare_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('gas_fare_per_km',8,2);
            $table->decimal('diesel_fare_per_km',8,2);
            $table->decimal('min_fare',8,2);
            $table->string('special_fare',155);
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
        Schema::dropIfExists('et_fare_settings');
    }
}

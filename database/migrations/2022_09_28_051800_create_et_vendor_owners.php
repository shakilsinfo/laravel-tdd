<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtVendorOwners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('et_vendor_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('vendor_id');
            $table->string('owner_name',50);
            $table->string('owner_email',150);
            $table->string('owner_phone',11);
            $table->string('owner_address',150);
            $table->string('vehicle_name',150);
            $table->string('photo',150);
            $table->tinyInteger('status')->default('1');
            $table->integer('total_vehicles');
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
        Schema::dropIfExists('et_vendor_owners');
    }
}

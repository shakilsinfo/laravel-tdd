<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtVendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('et_vendors', function (Blueprint $table) {
            $table->increments('id',10);
            $table->uuid('uuid');
            $table->string('name',50);
            $table->string('email',50)->unique();
            $table->string('contact_no',11);
            $table->string('address',155);
            $table->string('agreement_paper',155);
            $table->integer('total_vehicle');
            $table->integer('total_owner');
            $table->string('others_info')->nullable();
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
        Schema::dropIfExists('et_vendors');
    }
}

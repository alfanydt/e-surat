<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa', function (Blueprint $table) {
            $table->id();
            $table->string('letter_no');
            $table->date('letter_date');
            $table->string('first_party_name');
            $table->string('first_party_address');
            $table->string('first_party_nik');
            $table->string('second_party_name');
            $table->string('second_party_address');
            $table->string('second_party_position');
            $table->string('second_party_nik');
            $table->string('vehicle_type');
            $table->string('vehicle_brand');
            $table->string('vehicle_model');
            $table->string('vehicle_year');
            $table->string('vehicle_color');
            $table->string('vehicle_engine_size');
            $table->string('vehicle_frame_no');
            $table->string('vehicle_engine_no');
            $table->string('vehicle_bpkb_no');
            $table->string('vehicle_plate_no');
            $table->string('vehicle_owner');
            $table->string('vehicle_owner_address');
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
        Schema::dropIfExists('sewa');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJaminanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jaminan', function (Blueprint $table) {
            $table->id();
            $table->string('letter_no');
            $table->date('letter_date');
            $table->string('sender_name');
            $table->string('sender_position');
            $table->string('sender_address');
            $table->string('shm_number');
            $table->string('shm_area');
            $table->text('shm_location');
            $table->string('shm_owner');
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
        Schema::dropIfExists('jaminan');
    }
}

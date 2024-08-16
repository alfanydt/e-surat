<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar', function (Blueprint $table) {
            $table->id();
            $table->string('letter_no');
            $table->date('letter_date');
            $table->string('location');
            $table->string('regarding');
            $table->string('attachment')->nullable();
            $table->string('recipient_name');
            $table->string('recipient_address');
            $table->string('sender_name');
            $table->string('sender_position');
            $table->string('sender_address');
            $table->text('collateral_description');
            $table->date('auction_date');
            $table->string('cc')->nullable();
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
        Schema::dropIfExists('daftar');
    }
}

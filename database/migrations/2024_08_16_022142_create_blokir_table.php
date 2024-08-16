<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlokirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blokir', function (Blueprint $table) {
            $table->id();
            $table->string('letter_no');
            $table->date('letter_date');
            $table->string('lamp');
            $table->string('regarding');
            $table->string('recipient_name');
            $table->string('recipient_address');
            $table->string('sender_name');
            $table->string('sender_position');
            $table->string('sender_address');
            $table->text('vehicle_details'); // Menyimpan detail kendaraan dalam format teks
            $table->string('cc')->nullable(); // Nullable jika tidak ada tembusan
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blokir');
    }
}

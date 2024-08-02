<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLemburTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur', function (Blueprint $table) {
            $table->id();
            $table->date('letter_date');
            $table->string('recipient');
            $table->string('address');
            $table->string('sender_name');
            $table->string('sender_position');
            $table->text('overtime_reason');
            $table->text('employee_details');
            $table->string('approval1');
            $table->string('approval1_position');
            $table->string('approval2');
            $table->string('approval2_position');
            $table->string('approval3');
            $table->string('approval3_position');
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
        Schema::dropIfExists('lembur');
    }
}

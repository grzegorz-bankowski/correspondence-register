<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_letters', function (Blueprint $table) {
            $table->id();
            $table->date('incoming_date');
            $table->string('letter_num', 255);
            $table->string('sender_name', 255);
            $table->string('street', 255);
            $table->string('house_num', 255);
            $table->string('city', 255);
            $table->string('post_code', 255);
            $table->string('post', 255);
            $table->string('country', 255);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('incoming_letters');
    }
};

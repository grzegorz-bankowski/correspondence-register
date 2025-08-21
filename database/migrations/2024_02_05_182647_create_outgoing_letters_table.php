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
        Schema::create('outgoing_letters', function (Blueprint $table) {
			$table->id();
            $table->date('date');
            $table->string('number', 255);
            $table->string('recipient', 255);
            $table->string('street', 255);
            $table->string('city', 255);
            $table->string('code', 255);
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
        Schema::dropIfExists('outgoing_letters');
    }
};

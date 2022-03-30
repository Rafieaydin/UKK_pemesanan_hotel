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
        Schema::create('reservasi_kamar', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('reservasi_id')->references('uuid')->on('reservasi')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kamar_id')->constrained('kamar')->onDelete('cascade')->onUpdate('cascade');
            $table->enum('status', ['booking', 'checkin', 'checkout','batal'])->default('booking');
            $table->date('checkin')->nullable();
            $table->date('checkout')->nullable();
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
        Schema::dropIfExists('reservasi_kamar');
    }
};

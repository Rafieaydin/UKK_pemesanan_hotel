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
        Schema::create('reservasikamar_log', function (Blueprint $table) {
            $table->id();
            $table->string('tipe',50);
            $table->string('kode_kamar',50);
            $table->integer('harga');
            $table->date('checkin')->nullable();
            $table->date('checkout')->nullable();
            $table->string('status',50);
            $table->string('reservasi_id',50);
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
        Schema::dropIfExists('reservasikamar_log');
    }
};

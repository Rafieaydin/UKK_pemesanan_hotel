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
        Schema::create('reservasi_log', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('kode_booking');
            $table->string('tipe');
            $table->string('nama_pemesan');
            $table->string('nama_tamu');
            $table->string('email_pemesan');
            $table->string('nomor_hp_pemesan');
            $table->date('tanggal_checkin');
            $table->date('tanggal_checkout');
            $table->integer('jumlah_kamar')->default(0);
            $table->string('harga');
            $table->string('total_harga');
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
        Schema::dropIfExists('reservasi_log');
    }
};

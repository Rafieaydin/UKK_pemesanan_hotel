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
        Schema::create('tipe_kamar', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tipe');
            $table->string('keterangan');
            $table->integer('total_jumlah_kamar')->default(0);
            $table->string('gambar');
            $table->string('harga');
            $table->foreignId('admin_id')->constrained('admin')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::table('fasilitas_kamar', function (Blueprint $table) {
            $table->foreignId('tipe_id')->constrained('tipe_kamar')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('kamar', function (Blueprint $table) {
            $table->foreignId('tipe_id')->constrained('tipe_kamar')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('reservasi', function (Blueprint $table) {
            $table->foreignId('tipe_id')->constrained('tipe_kamar')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipe_kamar');
    }
};

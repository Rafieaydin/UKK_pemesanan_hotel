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
        Schema::create('fasilitas_kamar', function (Blueprint $table) {
            $table->id();
            // $table->string('tipe_fasilitas');
            $table->longText('nama_fasilitas');
            $table->string('incon_fasilitas');
            // $table->string('gambar');
            // $table->string('incon_fasilitas');
            $table->foreignId('admin_id')->constrained('admin')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('fasilitas_kamar');
    }
};

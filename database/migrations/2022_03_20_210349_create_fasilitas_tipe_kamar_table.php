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
        Schema::create('fasilitas_tipe_kamar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipe_id')->constrained('tipe_kamar')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('fasilitas_id')->constrained('fasilitas_kamar')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('fasilitas_tipe_kamar');
    }
};

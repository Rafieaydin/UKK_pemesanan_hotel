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
        // Schema::create('reservarsi_kamar', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignUuid('reservasi_id')->references('uuid')->on('reservasi')->onDelete('cascade')->onUpdate('cascade');
        //     $table->foreignId('kamar_id')->constrained('kamar')->onDelete('cascade')->onUpdate('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('resevarsi_kamar');
    }
};

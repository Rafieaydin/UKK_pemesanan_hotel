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
        Schema::create('resevarsi', function (Blueprint $table) {
            $table->uuid();
            $table->string('nama_pemesan');
            $table->string('nama_tamu');
            $table->string('email_pemesan');
            $table->string('nomor_hp_pemesan');
            $table->date('tanggal_checkin');
            $table->date('tanggal_checkout');
            $table->integer('jumlah_kamar');

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
        Schema::dropIfExists('resevarsi');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        DB::unprepared('
        DROP PROCEDURE IF EXISTS `cek_tipe_kamar`;
        CREATE PROCEDURE cek_tipe_kamar()
        BEGIN
        SELECT id,nama_tipe,total_jumlah_kamar_tersedia,
        total_jumlah_kamar_booking FROM tipe_kamar;
        END'
        );
        DB::unprepared('
        DROP PROCEDURE IF EXISTS `cek_kamar_dipesan`;
        CREATE PROCEDURE cek_kamar_dipesan()
        BEGIN
        SELECT nama_tipe,SUM(reservasi.jumlah_kamar) AS jumlah_kamar FROM reservasi RIGHT JOIN tipe_kamar ON reservasi.tipe_id = tipe_kamar.id GROUP BY tipe_kamar.id;
        END'
        );
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};

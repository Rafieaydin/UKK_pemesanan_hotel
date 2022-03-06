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
        SELECT id,nama_tipe FROM tipe_kamar;
        END'
        );
        DB::unprepared('
        DROP PROCEDURE IF EXISTS `cek_kamar_dipesan`;
        CREATE PROCEDURE cek_kamar_dipesan()
        BEGIN
        SELECT nama_tipe,count(resevarsi.jumlah_kamar) AS jumlah_kamar FROM resevarsi RIGHT JOIN tipe_kamar ON resevarsi.tipe_id = tipe_kamar.id GROUP BY nama_tipe;
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

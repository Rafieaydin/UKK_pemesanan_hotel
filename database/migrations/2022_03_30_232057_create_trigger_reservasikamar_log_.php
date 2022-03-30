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
        CREATE TRIGGER nambah_reservasikanamar_log
        AFTER DELETE ON reservasi_kamar
        FOR EACH ROW BEGIN
        DECLARE tipe_id int;
        DECLARE reservasi_id varchar(225);
        DECLARE tipe varchar(225);
        DECLARE kode_kamar varchar(225);
        DECLARE harga int;
        SET tipe_id = (SELECT kamar.tipe_id FROM kamar WHERE kamar.id = old.kamar_id);
        SET kode_kamar = (SELECT kamar.kode_kamar FROM kamar WHERE kamar.id = old.kamar_id);
        SET reservasi_id = (SELECT reservasi.uuid FROM reservasi WHERE uuid = old.reservasi_id);
        SET tipe = (SELECT tipe_kamar.nama_tipe FROM tipe_kamar WHERE tipe_kamar.id = tipe_id);
        SET harga = (SELECT tipe_kamar.harga FROM tipe_kamar WHERE tipe_kamar.id = tipe_id);
        INSERT INTO reservasikamar_log (tipe, kode_kamar, harga, checkin, checkout,status, reservasi_id) VALUES (tipe, kode_kamar, harga, old.checkin, old.checkout,old.status, reservasi_id);
        END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `nambah_reservasikanamar_log`');
    }
};

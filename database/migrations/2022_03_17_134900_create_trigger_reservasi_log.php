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
            CREATE TRIGGER add_reservasi_log
            AFTER DELETE ON reservasi
            FOR EACH ROW BEGIN
            DECLARE tipe varchar(225);
            DECLARE hargas int;
            SET tipe = (SELECT tipe_kamar.nama_tipe FROM tipe_kamar WHERE tipe_kamar.id = old.tipe_id);
            SET hargas = (SELECT tipe_kamar.harga FROM tipe_kamar WHERE tipe_kamar.id = old.tipe_id);
            INSERT INTO reservasi_log (uuid,tipe, nama_pemesan, nama_tamu, email_pemesan, nomor_hp_pemesan, tanggal_checkin, tanggal_checkout, jumlah_kamar, harga, total_harga, kode_booking)
            VALUES (old.uuid,tipe, old.nama_pemesan, old.nama_tamu, old.email_pemesan, old.nomor_hp_pemesan, old.tanggal_checkin, old.tanggal_checkout, old.jumlah_kamar, hargas, old.total_harga,old.kode_booking);
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
        DB::unprepared('DROP TRIGGER `add_reservasi_log`');
    }
};

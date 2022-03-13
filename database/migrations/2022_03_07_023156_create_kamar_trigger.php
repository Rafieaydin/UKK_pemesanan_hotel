<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
        CREATE TRIGGER nambah_jumlah_kamar
        AFTER INSERT ON kamar
        FOR EACH ROW
        BEGIN
        IF new.status = "0" THEN
        UPDATE tipe_kamar SET total_jumlah_kamar_tersedia = total_jumlah_kamar_tersedia + 1 WHERE id = new.tipe_id;
        END IF;
        IF new.status = "1" THEN
        UPDATE tipe_kamar SET total_jumlah_kamar_booking = total_jumlah_kamar_booking + 1 WHERE id = new.tipe_id;
        END IF;
        END'
        );

        DB::unprepared('
        CREATE TRIGGER kurang_jumlah_kamar
        AFTER DELETE ON kamar
        FOR EACH ROW
        BEGIN
        IF old.status = "0" THEN
        UPDATE tipe_kamar SET total_jumlah_kamar_tersedia = total_jumlah_kamar_tersedia - 1 WHERE id = old.tipe_id;
        END IF;
        IF old.status = "1" THEN
        UPDATE tipe_kamar SET total_jumlah_kamar_booking = total_jumlah_kamar_booking - 1 WHERE id = old.tipe_id;
        END IF;
        END'
        );

        DB::unprepared('
        CREATE TRIGGER update_jumlah_kamar
        AFTER UPDATE ON kamar
        FOR EACH ROW
        BEGIN
        IF NEW.status = "0"  THEN
        UPDATE tipe_kamar SET total_jumlah_kamar_tersedia = total_jumlah_kamar_tersedia + 1 WHERE id = new.tipe_id;
        UPDATE tipe_kamar SET total_jumlah_kamar_booking = total_jumlah_kamar_booking - 1 WHERE id = new.tipe_id;
        END IF;
        IF NEW.status = "1" THEN
        UPDATE tipe_kamar SET total_jumlah_kamar_booking = total_jumlah_kamar_booking + 1 WHERE id = new.tipe_id;
        UPDATE tipe_kamar SET total_jumlah_kamar_tersedia = total_jumlah_kamar_tersedia - 1 WHERE id = new.tipe_id;
        END IF;
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
        DB::unprepared('DROP TRIGGER `nambah_jumlah_kamar`');
        DB::unprepared('DROP TRIGGER `kurang_jumlah_kamar`');
        DB::unprepared('DROP TRIGGER `update_jumlah_kamar`');
    }
};

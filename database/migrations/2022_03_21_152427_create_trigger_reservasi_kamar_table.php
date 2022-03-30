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
        CREATE TRIGGER nambah_jumlah_reservasi
        AFTER INSERT ON reservasi_kamar
        FOR EACH ROW
        BEGIN
        UPDATE reservasi SET jumlah_kamar = jumlah_kamar + 1 WHERE uuid = new.reservasi_id;
        IF new.status = "checkout" THEN
        UPDATE kamar SET status = "0" WHERE id = new.kamar_id;
        ELSE
        UPDATE kamar SET status = "1" WHERE id = new.kamar_id;
        END IF;
        END'
        );

        DB::unprepared('
        CREATE TRIGGER kurang_jumlah_reservasi
        AFTER DELETE ON reservasi_kamar
        FOR EACH ROW
        BEGIN
        UPDATE reservasi SET jumlah_kamar = jumlah_kamar - 1 WHERE uuid = old.reservasi_id;
        IF old.status = "booking" THEN
        UPDATE kamar SET status = "0" WHERE id = old.kamar_id;
        END IF;
        IF old.status = "checkin" THEN
        UPDATE kamar SET status = "0" WHERE id = old.kamar_id;
        END IF;
        END'
        );

        DB::unprepared('
        CREATE TRIGGER update_jumlah_reservasi
        AFTER UPDATE ON reservasi_kamar
        FOR EACH ROW
        BEGIN
        UPDATE reservasi SET jumlah_kamar = jumlah_kamar + 1 WHERE uuid = new.reservasi_id;
        UPDATE reservasi SET jumlah_kamar = jumlah_kamar - 1 WHERE uuid = old.reservasi_id;
        IF old.status = "booking" THEN
        UPDATE kamar SET status = "0" WHERE id = old.kamar_id;
        END IF;
        IF old.status = "checkin" THEN
        UPDATE kamar SET status = "0" WHERE id = old.kamar_id;
        END IF;
        IF new.status = "booking" THEN
        UPDATE kamar SET status = "1" WHERE id = new.kamar_id;
        END IF;
        IF new.status = "checkin" THEN
        UPDATE kamar SET status = "1" WHERE id = new.kamar_id;
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
        DB::unprepared('DROP TRIGGER `nambah_jumlah_reservasi`');
        DB::unprepared('DROP TRIGGER `kurang_jumlah_kamar`');
        DB::unprepared('DROP TRIGGER `update_jumlah_reservasi`');
    }
};

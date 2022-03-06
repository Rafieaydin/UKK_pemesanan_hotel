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
        CREATE TRIGGER resevarsi_kurang_jumlah_kamar
        AFTER INSERT ON resevarsi
        FOR EACH ROW
        BEGIN
        UPDATE tipe_kamar SET total_jumlah_kamar = total_jumlah_kamar - new.jumlah_kamar WHERE id = new.tipe_id;
        END'
        );
        DB::unprepared('
        CREATE TRIGGER resevarsi_tambah_jumlah_resevarsi
        AFTER DELETE ON resevarsi
        FOR EACH ROW
        BEGIN
        UPDATE tipe_kamar SET total_jumlah_kamar = total_jumlah_kamar + old.jumlah_kamar WHERE id = old.tipe_id;
        END'
        );
        DB::unprepared('
        CREATE TRIGGER resevarsi_update_jumlah_resevarsi
        AFTER UPDATE ON resevarsi
        FOR EACH ROW
        BEGIN
        IF old.jumlah_kamar > new.jumlah_kamar THEN
        UPDATE tipe_kamar SET total_jumlah_kamar = total_jumlah_kamar + (old.jumlah_kamar - new.jumlah_kamar) WHERE id = new.tipe_id;
        END IF;
        IF old.jumlah_kamar < new.jumlah_kamar THEN
        UPDATE tipe_kamar SET total_jumlah_kamar = total_jumlah_kamar - (new.jumlah_kamar - old.jumlah_kamar) WHERE id = new.tipe_id;
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
        DB::unprepared('DROP TRIGGER `resevarsi_kurang_jumlah_kamar`');
        DB::unprepared('DROP TRIGGER `resevarsi_tambah_jumlah_resevarsi`');
        DB::unprepared('DROP TRIGGER `resevarsi_update_jumlah_resevarsi`');
    }
};

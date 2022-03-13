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
        // DB::unprepared('
        // CREATE TRIGGER ubah_status_kamar_booking
        // AFTER INSERT ON reservarsi_kamar
        // FOR EACH ROW
        // BEGIN
        // UPDATE kamar SET status = status + 1 WHERE id = new.kamar_id;
        // END'
        // );
        // DB::unprepared('
        // CREATE TRIGGER ubah_status_kamar_tersedia
        // AFTER DELETE ON reservarsi_kamar
        // FOR EACH ROW
        // BEGIN
        // UPDATE kamar SET status = status + 1 WHERE id = old.kamar_id;
        // END'
        // );
        // DB::unprepared('
        // CREATE TRIGGER update_staus_kamar
        // AFTER UPDATE ON reservarsi_kamar
        // FOR EACH ROW
        // BEGIN
        // UPDATE kamar SET status = status + 1 WHERE id = new.kamar_id;
        // UPDATE kamar SET status = status - 1 WHERE id = old.kamar_id;
        // END'
        // );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::unprepared('DROP TRIGGER `ubah_status_booking`');
        // DB::unprepared('DROP TRIGGER `ubah_status_tersedia`');
        // DB::unprepared('DROP TRIGGER `update_staus_kamar`');
    }
};

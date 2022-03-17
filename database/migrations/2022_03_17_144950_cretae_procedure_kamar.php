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
        DROP PROCEDURE IF EXISTS insert_kamar;
        CREATE procedure insert_kamar(nama_admin VARCHAR(200),nama_tipe VARCHAR(200),Kode_kamar VARCHAR(200),
        status_kamar VARCHAR(200))
        BEGIN
        DECLARE admin_id INT ;
        DECLARE tipe_id INT  ;
        DECLARE status INT  ;
        SElECT id into admin_id FROM admin WHERE admin.username = nama_admin;
        SElECT id into tipe_id FROM tipe_kamar WHERE tipe_kamar.nama_tipe = nama_tipe;
        IF status_kamar = "tersedia" THEN
            SET status = 1;
        ELSE
            SET status = 0;
        END IF;
        INSERT INTO kamar (admin_id, tipe_id, kode_kamar, status) VALUES (admin_id, tipe_id, kode_kamar, status);
        END;
        ');
        DB::unprepared('
        DROP PROCEDURE IF EXISTS update_kamar;
        CREATE procedure update_kamar(id_kamar INT,nama_admin VARCHAR(200),nama_tipe VARCHAR(200),Kode_kamar VARCHAR(200), status_kamar VARCHAR(225))
        BEGIN
        DECLARE admin_id INT ;
        DECLARE tipe_id INT  ;
        DECLARE status VARCHAR(225)  ;
        SElECT id into admin_id FROM admin WHERE admin.username = nama_admin;
        SElECT id into tipe_id FROM tipe_kamar WHERE tipe_kamar.nama_tipe = nama_tipe;
        IF status_kamar = "tersedia" THEN
            SET status = "0";
        ELSE
            SET status = "1";
        END IF;
        UPDATE kamar SET admin_id = admin_id, tipe_id = tipe_id, kode_kamar = kode_kamar, status = status WHERE id = id_kamar;
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
        DB::unprepared('DROP PROCEDURE IF EXISTS insert_kamar');
        DB::unprepared('DROP PROCEDURE IF EXISTS update_kamar');
    }
};

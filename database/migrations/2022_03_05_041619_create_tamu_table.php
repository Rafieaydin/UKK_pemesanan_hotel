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
        Schema::create('tamu', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('nama_tamu');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('alamat');
            $table->enum('jk', ['L', 'P']);
            $table->enum('status', ['0', '1']);
            $table->timestamps();
        });

        Schema::table('resevarsi', function (Blueprint $table) {
            // $table->foreignId('tamu_id')->constrained('tamu')->nullable()->onDelete('nullable')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tamu');
    }
};

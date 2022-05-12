<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jadwal', function (Blueprint $table) {
            $table->increments('id_kunjungan');
            $table->foreignId('id_pegawai')->unsigned();
            $table->foreignId('id_customer')->unsigned();
            $table->string('nama_pegawai', 10);
            $table->string('nama_customer', 10);
            $table->string('daerah', 10);
            $table->string('lokasi_kunjungan', 10);
            $table->date('tanggal');
            $table->string('keterangan', 10);
        });  

        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->foreign('id_pegawai')->references('id_pegawai')->on('tb_pegawai')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_jadwal');
    }
}

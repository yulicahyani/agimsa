<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penjualan', function (Blueprint $table) {
            $table->id('id_penjualan');
            $table->string('no_faktur');
            $table->foreignId('id_pemesanan')->unsigned();
            $table->foreignId('kode_barang')->unsigned();
            $table->string('nama_barang', 100);
            $table->date('tgl_penjualan');
            $table->integer('qty');
            $table->integer('harga');
            $table->integer('total_harga');
            $table->string('alamat', 100);
        });

        Schema::table('tb_penjualan', function (Blueprint $table) {
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('tb_pemesanan')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('tb_penjualan', function (Blueprint $table) {
            $table->foreign('kode_barang')->references('kode_barang')->on('tb_barang')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_penjualan');
    }
}

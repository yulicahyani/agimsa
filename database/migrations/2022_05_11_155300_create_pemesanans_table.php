<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pemesanan', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->foreignId('id_customer')->unsigned();
            $table->string('nama_customer', 10);
            $table->string('alamat', 10);
            $table->foreignId('kode_barang')->unsigned();
            $table->string('nama_barang', 10);
            $table->date('tanggal_pesan');
            $table->integer('qty');
            $table->string('pembayaran', 10);
            $table->integer('harga');
            $table->string('sales', 10);
            $table->string('status', 10);
        });

        Schema::table('tb_pemesanan', function (Blueprint $table) {
            $table->foreign('id_customer')->references('id_customer')->on('tb_customer')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('tb_pemesanan', function (Blueprint $table) {
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
        Schema::dropIfExists('tb_pemesanan');
    }
}

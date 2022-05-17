<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_target', function (Blueprint $table) {
            $table->id('id_target');
            $table->foreignId('id_pegawai')->unsigned();
            $table->string('nama_sales', 100);
            $table->date('tanggal');
            $table->integer('penjualan');
            $table->string('persentase', 10);
            $table->string('status', 100);
        });

        Schema::table('tb_target', function (Blueprint $table) {
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
        Schema::dropIfExists('tb_target');
    }
}

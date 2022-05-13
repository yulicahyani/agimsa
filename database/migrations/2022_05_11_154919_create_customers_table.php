<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_customer', function (Blueprint $table) {
            $table->id('id_customer');
            $table->string('nama_customer', 100);
            $table->string('daerah', 100);
            $table->string('alamat', 100);
            $table->string('telepon',12);
            $table->string('email', 100);
        });

        Schema::table('tb_jadwal', function (Blueprint $table) {
            $table->foreign('id_customer')->references('id_customer')->on('tb_customer')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_customer');
    }
}

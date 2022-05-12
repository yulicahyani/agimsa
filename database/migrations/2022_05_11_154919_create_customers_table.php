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
            $table->string('nama_customer', 10);
            $table->string('daerah', 10);
            $table->string('alamat', 10);
            $table->integer('telepon');
            $table->string('email', 10);
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

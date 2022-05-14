<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->id('id_pegawai'); 
            $table->string('jabatan', 100);
            $table->string('nama_pegawai', 100);
            $table->string('tempat_lahir', 100);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin', 10);
            $table->string('no_tlp',12);
            $table->string('username', 100);
            $table->string('password', 100);
            $table->string('agama', 100);
            $table->string('email', 100);
            $table->text('alamat');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pegawai');
    }
}

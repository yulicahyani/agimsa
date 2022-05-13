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
            $table->string('jabatan', 10);
            $table->string('nama_pegawai', 10);
            $table->string('tempat_lahir', 10);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin', 10);
            $table->integer('no_tlp');
            $table->string('username', 10);
            $table->string('password', 10);
            $table->string('agama', 10);
            $table->string('email', 10);
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

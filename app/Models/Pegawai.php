<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;


    protected $table = 'tb_pegawai';
    protected $primaryKey = 'id_pegawai';


    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }

    public function target()
    {
        return $this->hasMany(Target::class);
    }
}

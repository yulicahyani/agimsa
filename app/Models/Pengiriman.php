<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'tb_pengiriman';
    protected $primaryKey = 'id_pengiriman';
    public $timestamps = false;
}

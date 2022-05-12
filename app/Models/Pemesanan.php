<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'tb_pemesanan';
    protected $primaryKey = 'id_pemesanan';

    public function penjualan()
    {
        return $this->hasOne(Penjualan::class);
    }
}

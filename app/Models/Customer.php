<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'tb_customer';
    protected $primaryKey = 'id_customer';
    public $timestamps = false;

    public function jadwal()
    {
        return $this->hasOne(Jadwal::class);
    }
}

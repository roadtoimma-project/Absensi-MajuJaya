<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    protected $table = 'bonus';

    protected $fillable = [
        'karyawan_id',
        'periode_minggu',
        'total_jam_lembur',
        'jumlah_hari_rajin',
        'total_bonus'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
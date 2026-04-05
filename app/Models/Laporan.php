<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = [
        'karyawan_id',
        'periode',
        'total_absensi',
        'total_lembur',
        'total_bonus'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
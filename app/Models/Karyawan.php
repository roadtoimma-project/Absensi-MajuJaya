<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'user_id',
        'jabatan',
        'no_hp',
        'alamat'
    ];

    // RELASI
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function lembur()
    {
        return $this->hasMany(Lembur::class);
    }

    public function bonus()
    {
        return $this->hasMany(Bonus::class);
    }

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusLembur extends Model
{
    protected $table = 'bonus_lembur';

    protected $fillable = [
        'upah_per_jam'
    ];
}
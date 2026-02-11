<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $fillable = [
        'plate_number',
        'brand',
        'model',
        'year',
        'status',
        'image',
    ];

    public function peminjamans()
    {
        return $this->hasMany(\App\Models\Peminjaman::class);
    }
}

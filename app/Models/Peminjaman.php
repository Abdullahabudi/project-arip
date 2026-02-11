<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen'; // Explicitly define table name if pluralization is weird

    protected $fillable = [
        'user_id',
        'motor_id',
        'start_date',
        'end_date',
        'status',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function motor()
    {
        return $this->belongsTo(\App\Models\Motor::class);
    }
}

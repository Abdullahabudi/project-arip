<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';

    protected $fillable = [
        'borrower_name',
        'motor_id',
        'start_date',
        'end_date',
        'status',
        'notes',
    ];

    public function motor()
    {
        return $this->belongsTo(\App\Models\Motor::class);
    }
}

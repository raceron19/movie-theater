<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'identifier', 'email', 'phone', 'seats'
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title','description','price'
    ];

    protected $with = ['schedules'];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

}

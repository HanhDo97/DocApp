<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'speciality',
        'rank'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

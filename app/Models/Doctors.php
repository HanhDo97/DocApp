<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cate_code',
        'name',
        'about',
        'rank',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

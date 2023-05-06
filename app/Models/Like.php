<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'prefecture_id',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function Prefecture()
    {
        $this->belongsTo(Prefecture::class);
    }
}

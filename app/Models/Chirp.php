<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    protected $fillable = [
        'message',
        'likes',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'likes' => 'integer',
    ];
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // Optional: if you don’t want timestamps for likes
    public $timestamps = false;

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'chirp_id',
    ];

    /**
     * The user who made the like.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The chirp that was liked.
     */
    public function chirp()
    {
        return $this->belongsTo(Chirp::class);
    }
}

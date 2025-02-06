<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'date',
        'seats',
        'request',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}

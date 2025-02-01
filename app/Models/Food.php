<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'category',
    ];

    public function users() {
        return $this->belongsToMany(User::class, 'user_food', 'food_id')->withTimestamps();
    }

    public function getImageURL() {
        if($this->image) {
            return url('storage/' . $this->image);
        } else {
            return url('storage/foods/image-not-availible.jpeg');
        }
    }
}

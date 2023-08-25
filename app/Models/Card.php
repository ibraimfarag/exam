<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{

    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
    ];
    protected $casts = [
        'images' => 'array',
    ];
    public function images()
    {
        return $this->hasMany(Image::class); // Assuming you have an Image model
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}

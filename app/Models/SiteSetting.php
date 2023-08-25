<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $table = 'settings'; // Specify the table name

    protected $fillable = [
        'site_title',
        'site_meta',
        'site_description',
        'site_logo',
        'site_favicon',
        'hotline_number',
        'intro_text',
        'button_href',
        'button_text',
        'image1',
        'properties_title',
        'properties_description',

    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFormSubmission extends Model
{
    protected $table = 'contact_form_submissions'; // Name of the table

    use HasFactory;
    protected $fillable = ['name', 'email', 'phone_number', 'investment_amount', 'message'];
}

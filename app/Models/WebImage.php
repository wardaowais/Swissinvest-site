<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebImage extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'web_images';

    // Define the fillable properties
    protected $fillable = [
        'image',
        'page',
    ];
}

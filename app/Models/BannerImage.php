<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'image_position',
        'image',
        'status',
        'site_url'
    ];
}

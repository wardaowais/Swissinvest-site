<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NecessaryCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    // Define the relationship with the necessary_urls table
    public function necessaryUrls()
    {
        return $this->hasMany(NecessaryUrl::class, 'cat_id');
    }

    // Define the relationship with the necessary_sliders table
    public function necessarySliders()
    {
        return $this->hasMany(NecessarySlider::class, 'nec_id');
    }
}

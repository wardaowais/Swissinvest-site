<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NecessaryUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'title',
        'description',
        'phone',
        'email',
        'image',
        'address',
        'status',
    ];

    // Define the inverse relationship with the necessary_url_categories table
    public function necessaryUrlCategory()
    {
        return $this->belongsTo(NecessaryCategory::class, 'cat_id');
    }
    public function necessarySliders()
    {
        return $this->hasMany(NecessarySlider::class, 'nec_id');
    }
}

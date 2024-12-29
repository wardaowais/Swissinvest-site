<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NecessarySlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'nec_id',
        'image',
        'status',
    ];

    // Define the inverse relationship with the necessary_url_categories table
    public function necessaryUrl()
    {
        return $this->belongsTo(NecessaryUrl::class, 'nec_id');
    }
}

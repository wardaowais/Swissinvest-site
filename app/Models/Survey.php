<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'points', 'category_id'];

    public function questions()
    {
        return $this->hasMany(SurveyQuestion::class);
    }

    public function category()
    {
        return $this->belongsTo(SurveyCategory::class);
    }
}

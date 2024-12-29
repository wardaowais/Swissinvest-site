<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'faq_id', 'answer', 'status'];

    public function question()
    {
        return $this->belongsTo(FaqQuestion::class, 'faq_id');
    }
}

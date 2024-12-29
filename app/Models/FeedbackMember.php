<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subject',
        'details',
        'rating',
        'recommend',
        'priority',
        'is_read',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

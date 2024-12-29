<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSlider extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'image',
        'status',
    ];

    public function event()
    {
        return $this->belongsTo(MemberEvent::class, 'event_id');
    }
}

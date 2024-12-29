<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'specialities_id',
        'ttile_id',
        'title',
        'description',
        'event_url',
        'start_date',
        'end_date',
        'status',
    ];

    public function speciality()
    {
        return $this->belongsTo(Specialty::class, 'specialities_id');
    }

    public function MemberTitle()
    {
        return $this->belongsTo(MemberTitle::class, 'ttile_id');
    }
    public function eventSliders()
    {
        return $this->hasMany(EventSlider::class, 'event_id');
    }
}

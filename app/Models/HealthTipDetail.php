<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthTipDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'tips_id',
        'tips',
        'status',
    ];

    /**
     * Define the relationship with the HealthTip model.
     * A health tip detail belongs to a health tip.
     */
    public function healthTip()
    {
        return $this->belongsTo(HealthTip::class, 'tips_id');
    }
}


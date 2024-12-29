<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthTip extends Model
{
    use HasFactory;
    protected $fillable = [
        'tips_header',
        'image',
        'tips_footer',
        'status',
    ];
    public function healthTipDetails()
    {
        return $this->hasMany(HealthTipDetail::class, 'tips_id');
    }
}

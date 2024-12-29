<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ads_set',
        'title',
        'details',
        'images',
        'start_date', 
        'end_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the AdSetting model
    public function adSetting()
    {
        return $this->belongsTo(AdsSetting::class, 'ads_set');
    }

}

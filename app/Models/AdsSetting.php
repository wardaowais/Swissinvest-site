<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'ads_type',
        'payment',
        'duration',
    ];

    public function advertises()
     {
         return $this->hasMany(Advertise::class, 'ads_set');
    }
}

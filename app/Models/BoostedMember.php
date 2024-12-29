<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoostedMember extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'boost_id', //ads seetings id
        'paid_amount',
        'status',
        'end_date',
    ];

    /**
     * Get the user that owns the boosted member record.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the boost setting that this boosted member is related to.
     */
    public function boostSetting()
    {
        return $this->belongsTo(AdsSetting::class, 'boost_id');
    }
}

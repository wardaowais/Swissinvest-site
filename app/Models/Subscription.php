<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    /**
     * Get the plan associated with the subscription.
     */
    protected $fillable = [
        'user_id',
        'plan_id ',
        'end_date',
        'status',
    ];
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
}

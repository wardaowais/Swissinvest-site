<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'host_id',
        'user_id',
        'status',
    ];

    /**
     * Get the host associated with the member group.
     */
    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    /**
     * Get the user associated with the member group.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }
}

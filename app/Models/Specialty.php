<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'patient_category');
    }
    public function users()
    {
        return $this->hasMany(User::class, 'specialties');
    }
    public function memberEvents()
    {
        return $this->hasMany(MemberEvent::class, 'specialities_id');
    }
}

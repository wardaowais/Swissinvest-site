<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country',
        'city',
        'address',
        'postal_code',
        'language',
        'phone',
        'birth_date',
        'gender',
        'profile_pic',
        'about_me',
        'insurance_name',
        'insurance_number',
        'extension_code'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'pt_id');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id');
    }
    public function cityRelation()
    {
        return $this->belongsTo(City::class, 'city');
    }
    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'patient_category');
    }
    public function favoriteDoctors()
    {
        return $this->hasMany(FavoriteDoctor::class);
    }
}

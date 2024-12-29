<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Define the fillable properties
    protected $fillable = [
        'user_id', 
        'pt_id', 
        'from_time', 
        'to_time', 
        'booking_date', 
        'patient_category', 
        'reason', 
        'fees', 
        'payment_method', 
        'payment_status', 
        'booking_status', 
        'status',
        'author_by'
    ];
    

    // Define the relationship to the Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'pt_id');
    }

    // Define the relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function specialty()
    {
        return $this->belongsTo(Specialty::class, 'patient_category');
    }
}

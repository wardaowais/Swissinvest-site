<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteDoctor extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'doctor_id','status'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Relationship with User (as doctor)
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorCertificate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'documnet_id',
        'image',
    ];

    /**
     * Get the document associated with the doctor certificate.
     */
    public function doctorCertificate()
    {
        return $this->belongsTo(Verification::class, 'documnet_id');
    }
}

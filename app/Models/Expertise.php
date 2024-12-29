<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expertise extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'sxpertise');
    }
}

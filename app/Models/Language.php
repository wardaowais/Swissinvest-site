<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'code', 
        'translation_status', // Add translation_status to fillable
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'language');
    }
}

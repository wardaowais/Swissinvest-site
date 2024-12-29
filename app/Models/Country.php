<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'country');
    }
    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'country_id');
    }
    public function institutes()
    {
        return $this->hasMany(Institute::class);
    }
}

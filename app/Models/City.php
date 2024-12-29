<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
    public function users()
    {
        return $this->hasMany(User::class, 'city');
    }
    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'city_id');
    }
    public function institutes()
    {
        return $this->hasMany(Institute::class);
    }
    public function canton()
    {
        return $this->belongsTo(Canton::class, 'canton_id'); // 'canton_id' is the foreign key
    }
}

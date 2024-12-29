<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberTitle extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function memberEvents()
    {
        return $this->hasMany(MemberEvent::class, 'ttile_id');
    }
}

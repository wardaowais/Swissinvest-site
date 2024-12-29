<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;

    protected $table = 'job_categories';

    protected $fillable = [
        'name',
        'status',
    ];

    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'cat_id');
    }
}

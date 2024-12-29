<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $table = 'job_posts';

    protected $fillable = [
        'user_id',
        'cat_id',
        'job_title',
        'job_details',
        'city_id',
        'job_contract',
        'salary',
        'address',
        'email',
        'phone',
        'opening_hour',
        'priority',
        'country_id',
        'duration', 
        'start_date',//organization name
        'end_date',
        'status',
        'type'
        
    ];

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'cat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}

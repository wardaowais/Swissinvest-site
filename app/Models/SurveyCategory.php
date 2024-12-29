<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name','image',
    'background_color'];

    public function surveys()
    {
        return $this->hasMany(Survey::class, 'category_id');
    }
}

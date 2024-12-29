<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_category_id',
        'name',
        'description',
        'image',
        'book_pdf',
    ];


    public function category()
    {
        return $this->belongsTo(BookCategory::class, 'book_category_id');
    }
}

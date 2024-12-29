<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;
     // Add the fillable fields
     protected $fillable = ['name', 'description'];

     // Define the relationship with the Book model
     public function books()
     {
         return $this->hasMany(Book::class, 'book_category_id');
     }
}

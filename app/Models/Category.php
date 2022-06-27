<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Books;
class Category extends Model
{
    use HasFactory;
    protected $fillable =['id','name','description'];

    public function books()//create relationship with book and category
    {
        return $this ->hasMany(Books::class);
    }
}

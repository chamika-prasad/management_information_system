<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Books extends Model
{
    use HasFactory;
    protected $fillable =['id','name','category_id','author','publisher','file','user_id'];

    //book is belongs to category
    public function category()
    {
        return $this->belongsTo(Category::class);//this line Category mean model name
        //return $this->belongsTo('Category', 'id');
    }

    public function user(){ //whatever function name
        return $this->belongsTo(User::class);//Model name
    }
}
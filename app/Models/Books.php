<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Category;
class Books extends Model
{
    use HasFactory;
    protected $fillable =['id','name','category','author','publisher','file'];

    //book is belongs to category
    public function category()
    {
        return $this->belongsTo(Category::class);//this line Category mean model name
    }
}

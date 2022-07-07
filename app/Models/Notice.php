<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;
    protected $fillable =['title','description','image','user_id'];

    public function user(){ //whatever function name
        return $this->belongsTo(User::class);//Model name
    }
}

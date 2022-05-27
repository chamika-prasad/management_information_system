<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;

    public function user(){ //what ever function name
        return $this->belongsTo(User::class);//Model name
    }
}

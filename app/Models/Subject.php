<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function class_names(){ //table name in singular
        return $this->hasOne(ClassName::class);//model name
    }

    public function user(){ //what ever function name
        return $this->belongsTo(User::class);//Model name
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grading extends Model
{
    use HasFactory;
    protected $fillable =['semOne', 'semTwo' , 'semThree'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeSemtwo extends Model
{
    use HasFactory;
    protected $fillable =['semTwoBudhdha', 'semTwoPali' , 'semTwoAbhi' , 'semTwoAssignment'];
}

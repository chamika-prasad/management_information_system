<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeSemThree extends Model
{
    use HasFactory;
    protected $fillable =['semThreeBudhdha', 'semThreePali' , 'semThreeAbhi' , 'semThreeAssignment'];
}

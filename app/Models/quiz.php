<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable=[
        'description_about_quiz',
        'add_quiz_paper',
        'guidline',
        'date_and_time'

        
    ];
}


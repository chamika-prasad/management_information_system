<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;
    protected $fillable = ['description_about_exam','add_exam_paper','date_and_time','guidline','isfinished','subject_id'];
}

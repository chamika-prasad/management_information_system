<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'type',
        'approved',
        'slipName'
    ];

    public function user(){ //what ever function name
        return $this->belongsTo(User::class);//Model name
    }
}

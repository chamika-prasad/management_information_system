<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'index',
        'usertype',
        'birthdate',
        'address',
        'mobileNumber',
        'birthplace',
        'requestedgrade',
        'gender',
        'school',
        'fathername',
        'f_occupation',
        'f_place',
        'mothername',
        'm_occupation',
        'm_place',
        'admissioncategory',



    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /* public function free_application(){ //table name in singular
        return $this->hasOne(FreeApplication::class);//model name
    }

    public function payment(){ //table name in singular
        return $this->hasMany(Payment::class);//model name
    }

    public function className(){ //table name in singular
        return $this->hasMany(className::class);//model name
    }

    public function subject(){ //table name in singular
        return $this->hasMany(subject::class);//model name
    } */

    // protected $appends = [
    //     '_profile_photo_url',
    // ];
//     public function profile()
//     {
//     return $this->hasOne(Profile::class,'user_id');
// }
}

<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    const VERIFIED_USER = '1';
    const UNVERIFIED_USER = '0';

    CONST ADMIN_USER ='True';
    CONST REGULAR_USER='False';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','verified','verification_token','admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','verification_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isVerified()
    {
       return $this->verified == User::VERIFIED_USER;
    }
    public function isAdmin()
    {
        return $this->admin == User::ADMIN_USER;
    }
    public static function generateVerificationCode()
    {
        return  Str::random(40);
    }
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
    }
    public function getNameAttribute($name)
    {
        return ucwords($name);
    }
    public function setEmailAttribute($email){
        $this->attribute['email']= strtolower($email);
    }
}

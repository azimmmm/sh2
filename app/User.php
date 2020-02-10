<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\MailResetPasswordToken;
class User extends Authenticatable
{
    use Notifiable;

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));

    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function photos()
    {
        return $this->hasMany(Photo::class);

    }
    public function products()
    {
        return $this->hasMany(Product::class);

    }

    public function address()
    {
       return $this->hasOne(Address::class);
    }
    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);

    }

    public function orders()
    {
        return $this->hasMany(Order::class);

    }
}

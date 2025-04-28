<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    public function posts()
{
    return $this->hasMany(Post::class);
}


public function getJWTIdentifier()
{
    return $this->getKey();
}
public function profile(){
return $this->hasOne(Profile::class);
}


public function getJWTCustomClaims()
{
    return [];
}
public function setNameAttribute($value)
{
    $this->attributes['name'] = 'السيد/ ' . $value;
    $user = new User();
$user->name = 'أحمد';
$user->save();
}
public function setPasswordAttribute($value)
{
    $this->attributes['password'] = bcrypt($value);
    $user = new User();
$user->password = '123456';
$user->save();

}
public function setBirthDateAttribute($value)
{
    $this->attributes['birth_date'] = $value;
    $this->attributes['age'] = Carbon::parse($value)->age;
    $user = new User();
$user->birth_date = '1990-05-15'; 
$user->save();
}


   

}

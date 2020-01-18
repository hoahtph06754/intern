<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','birthday',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   

    public function posts()
    {
        // dd($posts);
        return $this->hasMany(Post::class);
    }

     public function getNameAttribute ($value)
    {
        // $this->attributes['name'] = strtoupper($value);   
        return strtoupper($value); 
    }

    public function setPasswordAttribute ($value)
    {
        $this->attributes['password'] = bcrypt($value);    
    }
}

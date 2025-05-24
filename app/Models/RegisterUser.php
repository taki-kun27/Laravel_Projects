<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class RegisterUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'register_user';
    protected $fillable = ['username', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function getAuthIdentifierName()
    {
        return 'username';
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });
    }
}

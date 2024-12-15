<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;   // Sanctum Trait
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;  // Use Sanctum's HasApiTokens trait

    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getFormattedEmailVerifiedAtAttribute()
    {
        return $this->email_verified_at
            ? Carbon::parse($this->email_verified_at)->format('Y-m-d')
            : 'N/A';
    }
}

<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
    'first_name',
    'last_name',
    'email',
    'password'
    ];
    
    //HasMany dialogues
    public function dialogues(): HasMany
    {
        return $this->hasMany(Dialogues::class);
    }
}

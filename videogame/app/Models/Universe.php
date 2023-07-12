<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Universe extends Model
{
    use HasFactory;
    protected $fillable = [
        'title'];

    //HasMany characters
    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}

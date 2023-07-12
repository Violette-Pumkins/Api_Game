<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dialogue extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'universe_id',
        'character_id'
    ];

    //BelongToOne user - HasOne character -HasMany message

    public function messages(): HasMany
    {
        return $this->hasMany(Messages::class);
    }
    public function character(): HasOne
    {
        return $this->hasOne(Character::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use App\Models\Universe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Character extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name', 
        'universe_id',
    ];

    //BelongsToOne
    public function universe(): BelongsTo
    {
        return $this->belongsTo(Universe::class);
    }
}

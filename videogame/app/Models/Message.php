<?php

namespace App\Models;

use App\Models\Dialogue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'universe_id',
        'character_id',
        'dialogue_id',
        'content'
    ];
    //BelongsToOne dialogue
    public function dialogue()
    {
        return $this->belongsTo(Dialogue::class);
    }
}

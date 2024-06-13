<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Persona extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'event_id'
    ];

    public function event() :BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventSponsor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function eventprogram():HasMany
    {
        return $this->hasMany(EventProgram::class, 'event_id');
    }
    public function sponsor(): BelongsTo
    {
        return $this->belongsTo(Sponsor::class);
    }

}

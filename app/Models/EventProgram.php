<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventProgram extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function eventSponsors(): BelongsTo
    {
        return $this->belongsTo(EventSponsor::class);
    }
}

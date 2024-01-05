<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sponsor extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function eventSponsors()
    {
        return $this->hasMany(EventSponsor::class, 'event_sponsor_id');
    }
}

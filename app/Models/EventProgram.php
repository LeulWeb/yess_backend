<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventProgram extends Model
{
    use HasFactory;
//target_audience coord location date description title
    protected $fillable = [
        'title',
        'description',
        'target_audience',
        'location',
        'date',
        'coord',


    ];

    // local scope query
    public function scopeSearch($query, $search){
        return $query->where('title','LIKE','%'.$search.'%');
    }
    public function eventSponsors(): BelongsTo
    {
        return $this->belongsTo(EventSponsor::class);
    }
}

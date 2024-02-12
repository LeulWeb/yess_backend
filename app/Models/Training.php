<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Trainer;

class Training extends Model
{
    use HasFactory;




    // protected $casts = [
    //     'youtube_links' => 'array',
    // ];
    protected $fillable = [
        'description',
        'title',
        'image',
        'youtube_links',
        'playlist_link',
        'visible'

        // Add other fillable attributes here
    ];

    // local scope query
       public function scopeSearch($query, $search) {
        return $query->where('title', 'LIKE', "%$search%");
    }

    public function trainer()  {
        return $this->belongsTo(Trainer::class);
    }

}

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
    protected $guarded = [];

    // local scope query
       public function scopeSearch($query, $search) {
        return $query->where('title', 'LIKE', "%$search%");
    }

    public function trainer()  {
        return $this->belongsTo(Trainer::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Youth extends Model
{
    use HasFactory;

    use HasFactory;
    protected $guarded = [];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function scopeSearch($query, $search){
        return $query->where('user->name','LIKE','%'.$search.'%');
    }

}

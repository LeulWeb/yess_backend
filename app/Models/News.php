<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'logo',
        'thumbnail',
        'featured',
        'author',
        'date',
        'links',
        'tags',
        'is_visible',

    ];
    

    // local scope query
    public function scopeSearch($query, $search){
        return $query->where('title','LIKE','%'.$search.'%')->orWhere('author', 'LIKE','%'.$search.'%');
    }
}

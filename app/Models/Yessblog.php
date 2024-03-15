<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yessblog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'author', 'imageName','category', 'tag'];
    public function scopeSearch($query, $search)
    {
        return $query->where('title','LIKE','%'.$search.'%')->orWhere('author', 'LIKE','%'.$search.'%');
    }
}

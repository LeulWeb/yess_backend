<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];   
    
    public function scopeSearch($query, $search)
    {
        return $query->where('title','LIKE','%'.$search.'%')->orWhere('author', 'LIKE','%'.$search.'%');


}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscriber extends Model
{
    use HasFactory;
    protected $guarded = [];

    // local scope query
    public function scopeSearch($query, $search){
        return $query->where('name','LIKE','%'.$search.'%');
    }
}

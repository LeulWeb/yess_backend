<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded = [];
    // local scope query
    public function scopeSearch($query, $search)
    {
        return $query->where('title','LIKE','%'.$search.'%')->orWhere('contact_email', 'LIKE','%'.$search.'%');
    }
}

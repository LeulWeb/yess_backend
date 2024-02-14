<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class subscriber extends Model
{
    use Notifiable;
    use HasFactory;
    protected $guarded = [];

    // local scope query
    public function scopeSearch($query, $search){
        return $query->where('name','LIKE','%'.$search.'%');
    }

}

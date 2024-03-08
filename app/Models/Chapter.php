<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function scopeSearch($query, $search){
        return $query->where('title','LIKE','%'.$search.'%');
    }
    
    public function trainings(){
        return $this->belongsTo(Training::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Training;

class YessChapter extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function scopeSearch($query, $search){
        return $query->where('title','LIKE','%'.$search.'%');
    }
    
    public function training(){
        return $this->belongsTo(Training::class);
    }
}

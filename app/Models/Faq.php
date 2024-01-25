<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    // protected $guarded = [];




    protected $fillable = ['question','answer', ];
    public function scopeSearch($query, $search){
        return $query->where('question','LIKE','%'.$search.'%');
    }


}

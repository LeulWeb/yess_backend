<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function scopeSearch($query, $keyword){
        return $query->where("title","LIKE","%". $keyword ."%")->orWhere("institution","LIKE","%". $keyword ."%")->orWhere("program","LIKE","%". $keyword ."%");
    }
}

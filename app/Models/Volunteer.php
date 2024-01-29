<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
 
    use HasFactory;


    

    protected $guarded = [];


    public function volunteerApplication()
    {
        return $this->hasOne(VolunteerApplication::class);
    }


    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'LIKE', "%$search%");
    }


    public function scopeFilter($query, $filters){
        if(isset($filters)){
            return $query->where('activity_type',$filters);
        }


        return $query;
    }
}

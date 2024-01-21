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
}

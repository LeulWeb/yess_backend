<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerApplication extends Model
{
    use HasFactory;



    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function volunteer(){
        return $this->belongsTo(Volunteer::class);
    }
}

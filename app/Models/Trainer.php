<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Training;

class Trainer extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function trainings(){
        return $this->hasMany(Training::class);
    }
}

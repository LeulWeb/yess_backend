<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Training;

class Trainer extends Model
{
        use HasFactory;

        protected $fillable = [
            'name',
            'profile',

             'email',];

        // local scope query
        public function scopeSearch($query, $search){
            return $query->where('name','LIKE','%'.$search.'%')->orWhere('email', 'LIKE','%'.$search.'%');
        }
    public function trainings(){
        return $this->hasMany(Training::class);
    }
}

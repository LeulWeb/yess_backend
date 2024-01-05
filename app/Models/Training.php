<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;
    public function enrollments(): HasMany
    {
        return $this->hasMany(TrainingEnrollment::class);
    }
    public function trainer_enrollments(): HasMany
    {
        return $this->hasMany(Trainer_enrollment::class);
    }

}

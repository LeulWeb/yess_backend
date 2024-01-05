<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainer extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function trainer_enrollments(): HasMany
    {
        return $this->hasMany(Trainer_enrollment::class);
    }
}

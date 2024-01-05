<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingEnrollment extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

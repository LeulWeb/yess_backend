<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function scopeSearch($query, $keyword){
        return $query->where("job_type","LIKE","%". $keyword ."%")->orWhere('position', 'LIKE','%'.$keyword.'%')->orWhere('educationLevel', 'LIKE','%'.$keyword.'%');
    }
}

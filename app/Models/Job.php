<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $guarded = [];
    // local scope query
   
    public function scopeSearch($query, $search)
    {
        return $query->where('title', 'LIKE', "%{$search}%");
    }


    public function scopeFilterBySector($query, $filters)
    {
        if (isset($filters)) {
            return $query->where('sector', $filters);
        }

        return $query;
    }

    // filter by job type
    public function scopeFilterByJobType($query, $filters)
    {
        if (isset($filters)) {
            return $query->where('schedule', $filters);
        }
        return $query;
    }


    public function scopeFilterByExperience($query, $years)
    {
        if (isset($years)) {
            if ($years == 0) {
                return $query->where('experience', '<=', 1);
            }
            return $query->where('experience', '>=', $years);
        }
        return $query;
    }
}

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


    public function scopeFilterBySector($query, $sector)
    {
        if (isset($sector)) {
            return $query->where('sector', $sector);
        }

        return $query;
    }
    public function scopeFilterByGender($query, $gender)
    {
        if (isset($gender)) {
            return $query->where('sector', $gender);
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
            //  15 years of experience
            if ($years ==  "15") {

                return $query->where('experience', [10,  15]);
            }
            //  10 years of experience
            if ($years ==  10) {
                return $query->whereBetween('experience', [5,  10]);
            }
            //  5 years of experience
            if ($years ==  5) {
                return $query->whereBetween('experience', [1,  5]);
            }
            // Less than a year
            if ($years ==  0) {
                return $query->where('experience', '<=',  1);
            }
        }
        return $query;
    }

}

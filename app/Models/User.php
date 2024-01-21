<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Education;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;




    // filtering options
    public function scopeRole($query , $role){
        if(!empty($role)){
            return $query->where('role', $role);
        }
            return $query;
    }

    public function scopeSearch($query, $search){
        if(!empty($search)){
            return $query->where('name', 'like', '%'.$search.'%');
        }
    }


    protected $guarded = [];


    public function scholarshipRequests(): HasMany {
        return $this->hasMany(ScholarshipRequest::class);
    }

    public function volunteerApplication(): HasMany {
        return $this->hasMany(VolunteerApplication::class);
    }


    public function location(): HasMany
    {
        return $this->hasMany(Location::class);
    }

    public function education(): HasOne
    {
        return $this->hasOne(Education::class);
    }


    public function youth(): HasOne
    {
        return $this->hasOne(Youth::class);
    }


   

    public function fundingRequests(): HasMany
    {
        return $this->hasMany(FundingRequest::class);
    }


    public function jobRequest(): HasMany{
        return $this->hasMany(JobRequest::class);
    }

}

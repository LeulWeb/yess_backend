<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function location(): HasMany
    {
        return $this->hasMany(Location::class);
    }

    public function education(): HasOne
    {
        return $this->hasOne(Education::class);
    }
    public function volunteerApplications(): HasMany
    {
        return $this->hasMany(VolunteerApplication::class);
    }

    public function promotions(): HasMany
    {
        return $this->hasMany(leaderboard::class);
    }

    public function trainingEnrollments(): HasMany
    {
        return $this->hasMany(TrainingEnrollment::class);
    }

    public function fundingRequests(): HasMany
    {
        return $this->hasMany(FundingRequest::class);
    }


    public function jobRequest(): HasMany{
        return $this->hasMany(JobRequest::class);
    }

}
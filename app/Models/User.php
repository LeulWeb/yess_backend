<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Education;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;


    // updated model
    public function sendEmailVerificationNotification()
    {
        return $this->notify(new VerifyEmail);
    }

    // public function hasVerifiedEmail()
    // {
    //     return !is_null($this->email_verified_at);
    // }
    // end of updated


    // filtering options
    public function scopeRole($query, $role)
    {
        if (!empty($role)) {
            return $query->where('role', $role);
        }
        return $query;
    }

    public function scopeStatus($query, $status)
    {
        if (!empty($status)) {
            return $query->where('status', $status);
        }
        return $query;
    }

    public function scopeSearch($query, $search)
    {
        if (!empty($search)) {
            return $query->where('name', 'like', '%' . $search . '%');
        }
    }


    protected $guarded = [];


    public function scholarshipRequests(): HasMany
    {
        return $this->hasMany(ScholarshipRequest::class);
    }

    public function volunteerApplication(): HasMany
    {
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


    public function donationRequest(): HasMany
    {
        return $this->hasMany(DonationRequest::class);
    }

    public function youth(): HasOne
    {
        return $this->hasOne(Youth::class);
    }




    public function fundingRequests(): HasMany
    {
        return $this->hasMany(FundingRequest::class);
    }


    public function jobRequest(): HasMany
    {
        return $this->hasMany(JobRequest::class);
    }
}

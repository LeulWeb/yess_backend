<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'organization',
        'email',
        'logo',
        'phone',
        'area_of_collaboration',
        'agreement_file',
        'organization_type',
        'status',
    ];
    public function scopeSearch($query, $search){
        return $query->where('phone','LIKE','%'.$search.'%');
    }

}

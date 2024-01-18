<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    use HasFactory;






    protected $fillable = [
        'name',
        'description',
        'logo',
        'image',
        'sector',
        'product_service',
        'employees',
        'founder',
        'contact_email',
        'contact_phone',
        'location',
        'website',
        'facebook',
        'linkedin',
        'instagram',
        'telegram'
    ];


    // local scope query
    public function scopeSearch($query, $search){
        return $query->where('name','LIKE','%'.$search.'%')->orWhere('founder', 'LIKE','%'.$search.'%');
    }
}

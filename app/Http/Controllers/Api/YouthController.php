<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Youth;
use Illuminate\Http\Request;

class YouthController extends Controller
{

    public function index(Request $request)
    {
        $searchTerm = $request->query('query');

        return Youth::select('id', 'image', 'video_link', 'user_id', 'is_published')->with(['user:id,name,phone,email,profile_picture,story', 'user.education:id,user_id,education_level,field_of_study,award,achievement'])->whereHas('user', function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%');
        })->get();
    }

    public function show(string $id)
    {
        $youth = Youth::select('id', 'image', 'video_link', 'user_id', 'is_published')->findOrFail($id);
        $youth->load(['user:id,name,phone,email,profile_picture,story', 'user.education:id,user_id,education_level,field_of_study,award,achievement']);
        return $youth;
    }
}

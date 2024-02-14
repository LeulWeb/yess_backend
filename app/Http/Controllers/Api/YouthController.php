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

        return Youth::select('id', 'video_link', 'user_id', 'is_published', "achievment")
            ->with(['user:id,name,phone,email,profile_picture,story'])
            ->whereHas('user', function ($query) use ($searchTerm) {
                $query->where('name', 'like', '%' . $searchTerm . '%');
            })
            ->latest('created_at') // Order by the 'created_at' column of the 'youths' table
            ->get();
    }

    public function show(string $id)
    {
        $youth = Youth::select('id', 'achievment', 'video_link', 'user_id', 'is_published')->findOrFail($id);
        $youth->load(['user:id,name,phone,email,profile_picture,story']);
        return $youth;
    }
}

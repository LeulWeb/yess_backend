<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Enums\EducationLevel;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeEducation(Request $request)
    {

        $userId = auth('sanctum')->id();

        $validated = $request->validate([
            'user_id' => 'unique:users,id,except,id',
            'education_level' => ['required', Rule::in(EducationLevel::getValues())],
            'field_of_study' => 'nullable|string|max:250',
            'grade' => 'nullable|numeric|between:1,5',
            'graduation_date' => 'nullable|date',
            'document' => 'nullable|file|mimes:pdf,doc,docx,txt',
            'award' => 'nullable|string|max:20000',
            'achievement' => 'nullable|string|max:20000',
        ]);


        EducationLevel::create($validated);

        return response()->json([
            'message' => 'Education level created successfully'
        ]);
    }


    public function showEducation()
    {
        $userId = auth('sanctum')->id();
        $user = \App\Models\User::find($userId);
        return response()->json([
            'education' => $user->education
        ]);
    }

  
}

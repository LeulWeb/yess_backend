<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Enums\EducationLevel;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Education;

class EducationController extends Controller
{



    public function storeEducation(Request $request)
    {

        $userId = auth('sanctum')->id();
        $educationLevel = EducationLevel::getValues();

        $validated = $request->validate([
            // 'user_id' => 'unique:users,id,except,id',
            'education_level' => ['required', Rule::in($educationLevel)],
            'field_of_study' => 'nullable|string|max:250',
            'award' => 'nullable|string|max:20000',
            'achievement' => 'nullable|string|max:20000',
        ]);

        $existingEducation = Education::where('user_id', $userId)->first();

        if ($existingEducation) {
            return response()->json([
                'error' => 'Education level already exists for this user.'
            ], 400);
        }


        $validated['user_id'] = $userId;
        Education::create($validated);


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

    public function updateEducation(Request $request)
    {
        $userId = auth('sanctum')->id();
        $educationLevel = EducationLevel::getValues();

        $validated = $request->validate([
            'education_level' => [Rule::in($educationLevel)],
            'field_of_study' => 'nullable|string|max:250',
            'award' => 'nullable|string|max:20000',
            'achievement' => 'nullable|string|max:20000',
        ]);

        $education = Education::where('user_id', $userId)->first();

        if (!$education) {
            return response()->json([
                'error' => 'No education level found for this user.'
            ], 404);
        }

        $education->fill($validated);
        $education->save();

        return response()->json([
            'education' => $education,
            'message' => 'Education level updated successfully'
        ]);
    }


    public function deleteEducation()
    {
        $userId = auth('sanctum')->id();

        $education = Education::where('user_id', $userId)->first();

        if (!$education) {
            return response()->json([
                'error' => 'No education level found for this user.'
            ], 404);
        }

        $education->delete();

        return response()->json([
            'message' => 'Education level deleted successfully'
        ]);
    }
}

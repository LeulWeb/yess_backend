<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Enums\EducationLevel;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\EducationResource;
use App\Models\Education;

class EducationController extends Controller
{



    public function storeEducation(Request $request)
    {
        $userId = auth('sanctum')->id();


        $educationLevel = EducationLevel::getValues();

        $validated = $request->validate([

            'education_level' => ['required', Rule::in($educationLevel)],
            'field_of_study' => 'nullable|string|max:250',
            'award' => 'nullable|string|max:20000',
            'achievement' => 'nullable|string|max:20000',
        ]);

        $validated['user_id'] = $userId;


        $existingEducation = Education::where('user_id', $userId)->first();

        try {
            if ($existingEducation) {
                $existingEducation->update($validated);
                return response()->json([
                    'message' => 'Education record updated successfully',
                ],  200); // Use  200 OK for successful updates
            }

            
            Education::create($validated);

            return response()->json([
                'message' => 'Education record created successfully',
            ],  201); // Use  201 Created for new resource creation
        } catch (\Exception $e) {
            // Handle any exceptions that occurred during the operation
            return response()->json([
                'error' => 'An error occurred while processing your request.',
                'details' => $e->getMessage(),
            ],  500); // Use  500 Internal Server Error for server errors
        }
    }



    public function showEducation()
    {
        $userId = auth('sanctum')->id();
        $user = \App\Models\User::find($userId);
        if (empty($user->education)) {
            return response()->json([
                'empty' => 'No education level found for this user.'
            ]);
        }

        return new EducationResource($user->education);
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

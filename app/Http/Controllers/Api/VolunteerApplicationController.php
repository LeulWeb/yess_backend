<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VolunteerApplicationResource;
use App\Models\VolunteerApplication;
use Illuminate\Http\Request;

class VolunteerApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $volunteerApplications = VolunteerApplication::where('user_id', auth('sanctum')->user()->id)->with('volunteer')->get();
        return VolunteerApplicationResource::collection($volunteerApplications);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'volunteer_id' => 'required|exists:volunteers,id',
            'phoneNumber' => 'required|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',
            'message' => 'nullable|string|max:300',
        ]);

        $validated['user_id'] = auth('sanctum')->id();

        VolunteerApplication::create($validated);

        return response()->json([
            'message' => 'Application submitted successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

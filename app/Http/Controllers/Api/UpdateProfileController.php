<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;

class UpdateProfileController extends Controller
{



    public function showProfile(Request $request)
    {
        $user = auth('sanctum')->user();
        return new UserResource($user);
    }


    public function updatePassword(Request $request)
    {
        $user = User::findOrFail(auth('sanctum')->id());
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ]);


        if (Hash::check($validated['current_password'], $user->password)) {
            $user->password = Hash::make($validated['password']);
            $user->save();
            return response()->json([
                'message' => 'Password updated successfully'
            ]);
        }

        return response()->json([
            'message' => 'Current password is incorrect'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $userId = auth('sanctum')->id();


        $request->merge(['email' => $request->input('email', User::find($userId)->email)]);

        $validated = $request->validate([

            'name' => ['required', 'string', 'min:3', 'max:15'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($userId)],
            'phone' => 'nullable|string|regex:/^\+(?:[0-9] ?){6,14}[0-9]$/',
            'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg,gif,JPG,PNG,JPEG|max:7168',
            'interest' => 'string|nullable',
            'skill' => 'string|nullable',
            'story' => 'string|nullable',
            'bio' => 'string|max:100|nullable',
            'country' => 'string|nullable|max:100',
            'region' => 'string|nullable|max:100',
            'city' => 'string|nullable|max:100',
        ]);


        if ($request->hasFile('profile_picture')) {
            $profilePictureName = time() . '.' . $request->file('profile_picture')->getClientOriginalExtension();
            $request->profile_picture->move(public_path('users_profile'), $profilePictureName);
            $validated['profile_picture'] = 'users_profile/' . $profilePictureName;
        }


        $user = User::findOrFail($userId);

        $user->update($validated);

        return new UserResource($user);
    }


    public function destroy(string $id)
    {
        //
    }
}

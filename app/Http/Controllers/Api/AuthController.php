<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user =  User::create($validated);

        // Send email verification notification
        $user->sendEmailVerificationNotification();



        $token = $user->createToken('authToken')->plainTextToken;



        return response()->json([
            'success' => true,
            'message' => "Check your email"
        ], 200);
    }





    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $request['device_name'] = 'android';
        $user = User::where('email', $request->email)->first();


        if ($user->status == 'inactive') {
            throw ValidationException::withMessages([
                'banned' => ['You are temporarily banned from our community. Contact admin for help'],
            ]);
        }

        if($user->email_verified_at == null){
            throw ValidationException::withMessages([
                'unverified' => 'Your email is not verified'
            ]);
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($request->device_name)->plainTextToken;
    }



    public function validateToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        $token = \Laravel\Sanctum\PersonalAccessToken::findToken($request->token);

        if ($token) {
            return response()->json(['valid' => true]);
        } else {
            return response()->json(['valid' => false]);
        }
    }



    public function logout(Request $request)
    {
        // we can get the user and simple delete the token
        $user = $request->user();

        $user->tokens()->delete();
        return response()->json(['message' => 'You are successfully logged out'], 200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'FirstName' => 'required|string|max:50',
            'LastName' => 'required|string|max:50',
            'PhoneNumber' => 'required|string|max:15',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'Role' => 'required|in:Patient,Doctor,Admin',
        ]);

        $user = User::create([
            'FirstName' => $validated['FirstName'],
            'LastName' => $validated['LastName'],
            'PhoneNumber' => $validated['PhoneNumber'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'Role' => $validated['Role'],
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}

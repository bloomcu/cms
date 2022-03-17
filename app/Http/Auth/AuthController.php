<?php

namespace Cms\Http\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Cms\App\Controllers\Controller;

// Domains
use Cms\Domain\Users\User;

// Resources
use Cms\Http\Users\Resources\UserResource;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'email' => $attr['email'],
            'password' => bcrypt($attr['password']),
        ]);

        return response()->json([
            'status' => 'Success',
            'message' => 'Registration successful',
            'data' => [
                'token_type' => 'Bearer',
                'access_token' => $user->createToken('access_token')->plainTextToken
            ]
        ], 200);
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return response()->json([
                'status' => 'Unauthorized',
                'message' => 'Credentials do not match'
            ], 401);
        }

        return response()->json([
            'status' => 'Success',
            'message' => 'Login successful',
            'data' => [
                'token_type' => 'Bearer',
                'token' => auth()->user()->createToken('auth_token')->plainTextToken
            ]
        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Tokens Revoked'
        ], 200);
    }
    
    public function me()
    {
        return new UserResource(Auth::user());
    }
}

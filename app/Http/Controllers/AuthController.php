<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => ['required','string']
        ]);
        if (!Auth::attempt($data)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $tokenResult = Auth::user()->createToken('authToken')->accessToken;

        return response()->json([
            'token' => $tokenResult,
        ],200);
    }

    public function logout()
    {
        Auth::user()->token()->revoke();
        return response()->json(['message' => 'User loged out!'], 200);
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        return response()->json([
            'message' => 'User created',
            'user' => $user,
        ], 200);
    }
}

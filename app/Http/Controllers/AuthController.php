<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registr(RegisterRequest $request)
    {
        User::create([
            ...$request->validated(),
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid data',
                'errors' => [
                    'email' => [
                        'Invalid data'
                    ]
                ]
            ]);
        } else {
            $user = Auth::user();
            return response()->json([
                'success' => true,
                'token' => $user->createToken("token for {$user->email}")->plainTextToken,
            ]);
        }

    }
}

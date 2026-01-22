<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (!auth()->user()->role == 'admin') {
                Auth::logout();
                return response()->json([
                    'success' => false,
                    'message' => 'У вас нет прав администратора'
                ]);
            }

            $request->session()->regenerate();
            return redirect('/courses');

        }

        return response()->json([
            'success' => false,
            'email' => 'The provider credentials do not match our records'
        ]);
    }
}

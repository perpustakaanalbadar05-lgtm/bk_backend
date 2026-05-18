<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah.'
            ], 401);
        }

        $token = Str::random(60);
        $user->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return response()->json([
            'token' => $token,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        // Simple token based logout is stateless, but we can clear the token
        if ($request->user()) {
            $request->user()->forceFill([
                'api_token' => null,
            ])->save();
        }

        return response()->json(['message' => 'Berhasil logout.']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}

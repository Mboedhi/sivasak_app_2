<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized'
            ], 401);
        }
        
        $user = $request->user();

        if($user->role != 'driver'){
            return response()->json([
                'status' => 'error',
                'message' => 'Anda bukan Driver'
            ],401);
        }

        $expired_at = Carbon::now()->endOfDay();
        $token = $user->createToken('auth');

        return response()->json([
            'expired_at' => $expired_at,
            'token' => $token->plainTextToken,
            'id' => $user->user_id,
            'email' => $user->email,
            'role' => $user->role,
            'name' => $user->name,
            'phone_number' => $user->phone_number,
            'vehicle_type' => $user->vehicle_type,
        ]);
    }
}
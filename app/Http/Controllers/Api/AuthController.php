<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\UserActivity;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'message' => 'Validation failed.',
                'errors' => $validator->errors()
            ]);
        }

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Create login activity record
            $userActivities = UserActivity::create([
                "user_id" => $user->id,
                "logged_in" => now(),
                "ip_address" => $request->ip(),
                "store_id" => $user->store_id,
            ]);

            // Generate API Token (Using Laravel Sanctum)
            $token = $user->createToken('AuthToken')->plainTextToken;

            if ($user->hasPermissionTo('backend')) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Logged in successfully',
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => $user
                ]);
            } else if ($user->hasPermissionTo('pos')) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Logged in successfully',
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => $user
                ]);
            } else {
                return response()->json([
                    'status' => 403,
                    'message' => 'You do not have permission to login'
                ]);
            }
        } else {
            return response()->json([
                'status' => 401,
                'message' => 'Invalid Credentials'
            ]);
        }
    }

}

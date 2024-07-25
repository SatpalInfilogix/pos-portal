<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function checkLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only(['email', 'password']);
      
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            echo "User authenticated<br>";

            if ($user->hasPermissionTo('backend')) {
                return redirect()->route('backend-dashboard');
            } else {
                return redirect()->route('pos-dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}

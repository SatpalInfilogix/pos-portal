<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\RedirectResponse;
use App\Models\UserActivity;
use Illuminate\Support\Facades\Session;

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
            
            $userActivities = UserActivity::create([
                "user_id" => $user->id,
                "logged_in" => now(),
                "ip_address" => $request->ip(),
                "store_id" => $user->store_id,
            ]);

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
        $userActivities = UserActivity::where('user_id',Auth::id())->latest('id')->first();
        $userActivities->update([
            "logged_out" => now()
        ]);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function update(Request $request)
    {
        $userActivities = UserActivity::where('user_id',Auth::id())->latest('id')->first();
        $userActivities->update([
            "amount_during_logout" => $request->tender_amount,
            "logged_out" => now()
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true
        ]);
    }
}

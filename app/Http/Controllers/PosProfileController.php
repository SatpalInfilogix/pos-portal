<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PosProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();

        return view('pos.profile.index', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user = User::where('id', Auth::id())->first();
        $oldProfile = NULL;
        if($user != '') {
            $oldProfile = $user->profile_image;
        }

        if ($request->hasFile('profile_image'))
        {
            $file = $request->file('profile_image');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile-pic/'), $filename);
        }

        $user->update([
            'first_name'      => $request->first_name,
            'last_name'       => $request->last_name,
            'phone_number'    => $request->phone_number,
            'profile_image'   => isset($filename) ? 'uploads/profile-pic/'. $filename : $oldProfile,
        ]);

        if($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('pos-dashboard.profile')->with('success', 'Profile updated successfully');
    }

}

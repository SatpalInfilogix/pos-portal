<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function getProfile()
    {
        $user = User::where('id',Auth::id())->first();

        if($user){
            return response()->json([
                'success' => true,
                'data'    => $user
            ]); 
        }else{
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function update(Request $request)
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

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
            'data'    => $user
        ]);
    }
}

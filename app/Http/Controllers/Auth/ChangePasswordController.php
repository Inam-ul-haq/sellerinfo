<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{

    public function ShowChangePasswordForm()
    {
        return view('auth.passwords.change');
    }
    public function ChangePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            //current passwords do not match
            return redirect()->back()->with('error', 'Your current password does not matches with the password you provided. Please try again.');
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //New and old passswords match
            return redirect()->back()->with('error', 'Current and new passwords should not match.');
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change passwords
        $user = Auth::user();
        $user->password =  Hash::make($request->get('new-password'));
        $user->save();
        return redirect()->back()->with('success', 'Password was changed successfully!');
    }
}

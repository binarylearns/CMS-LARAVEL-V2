<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('customprofile.edit', compact('user'));
    }

    // Update profile
    public function update(Request $request)
    {
        $user = Auth::user();



        // Validate the form
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:6|confirmed', // password_confirmation field must match
        ]);

        // Update name
        $user->name = $request->name;

        // Update password if provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Save changes
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}

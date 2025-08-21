<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $addresses = $user->addresses; // fetch all addresses
        return view('customer.profile.edit', compact('user', 'addresses'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'       => 'required|string|max:100',
            'email'      => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone'      => 'nullable|string|max:20',
            'password'   => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'notification_preference' => 'nullable|in:email,whatsapp,both,none',
            'remove_photo' => 'nullable|boolean',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->notification_preference = $request->notification_preference;

        // Update password if filled
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Remove old photo if requested
        if ($request->remove_photo == 1) {
            if ($user->profile_photo && file_exists(public_path($user->profile_photo))) {
                unlink(public_path($user->profile_photo));
            }
            $user->profile_photo = null;
        }

        // Handle new photo upload
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('user'), $fileName);

            $imagePath = 'user/' . $fileName;

            // delete old photo if exists
            if ($user->profile_photo && file_exists(public_path($user->profile_photo))) {
                unlink(public_path($user->profile_photo));
            }

            $user->profile_photo = $imagePath;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }




}
?>
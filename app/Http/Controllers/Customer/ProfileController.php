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
        return view('customer.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'phone'    => 'nullable|string|max:15',
            'address'  => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|confirmed', // Add confirmed if using password_confirmation field
        ]);

        $user = Auth::user();

        // Always update name/phone/address
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;

        // Only update password if user entered a new one
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully!');
    }

}
?>
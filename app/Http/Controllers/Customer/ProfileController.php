<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('customer.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'phone'  => 'required|string|max:15',
            'address'=> 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->update($request->only(['name', 'phone', 'address']));

        return back()->with('success', 'Profile updated successfully!');
    }
}
?>
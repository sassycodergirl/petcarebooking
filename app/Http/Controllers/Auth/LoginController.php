<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Return the proper redirect path after login.
     */
// protected function authenticated($request, $user)
// {
//     if ($user->is_admin == 1) {
//         return redirect()->route('admin.dashboard');
//     }

//     return redirect()->route('customer.dashboard');
// }
    protected function authenticated($request, $user)
    {
        if (!$user->hasVerifiedEmail()) {
            auth()->logout();

            return redirect()->route('verification.notice')
                ->with('message', 'Please verify your email before logging in.');
        }

        if ($user->is_admin == 1) {
            return redirect()->route('admin.dashboard');
        }
        // Customer redirect logic
        $redirectUrl = $request->query('redirect'); // get ?redirect= from URL
        if ($redirectUrl) {
            return redirect($redirectUrl); // back to booking page
        }

        return redirect()->route('customer.dashboard');
    }
    public function __construct()
    {
        // keep default middleware
        $this->middleware('guest')->except('logout');
    }
}

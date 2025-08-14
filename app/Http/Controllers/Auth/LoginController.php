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
protected function authenticated($request, $user)
{
    if ($user->is_admin == 1) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('dashboard');
}

    public function __construct()
    {
        // keep default middleware
        $this->middleware('guest')->except('logout');
    }
}

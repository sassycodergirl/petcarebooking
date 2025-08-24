<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

   



    //old latest
    //     protected function registered(Request $request, $user)
    // {
    //     // $this->guard()->logout(); // optional: log out until verified

    //     return redirect()->route('verification.notice')
    //         ->with('message', 'Please check your email to verify your account.');
    // }

    //old latest

    protected function registered(Request $request, $user)
    {
        // Save redirect URL in session
        if ($request->has('redirect')) {
            session(['booking_redirect' => $request->input('redirect')]);
        }

        // Send verification email
        $user->sendEmailVerificationNotification();

        // Respond with JSON for AJAX
        if ($request->ajax()) {
            return response()->json([
                'message' => 'Verification email sent! Please check your inbox.',
                'redirect_url' => $request->input('redirect', route('customer.dashboard'))
            ]);
        }

        return redirect()->route('verification.notice')
            ->with('message', 'Please check your email to verify your account.');
    }





}

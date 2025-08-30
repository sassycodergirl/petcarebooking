<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PhoneAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Send OTP via Twilio
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'regex:/^\+\d{10,15}$/'], // E.164 format
        ], [
            'phone.regex' => 'Use E.164 format (e.g. +9198XXXXXXXX).'
        ]);

        $phone = $request->input('phone');
        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));

        try {
            $twilio->verify->v2->services(config('services.twilio.verify_sid'))
                ->verifications
                ->create($phone, 'sms');
        } catch (\Exception $e) {
            Log::error('Twilio sendOtp error: '.$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Unable to send OTP right now.'], 500);
        }

        // store in session for verification
        session(['phone_for_otp' => $phone]);

        return response()->json(['success' => true, 'message' => 'OTP sent to '.$phone]);
    }

    /**
     * Verify OTP
     */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'digits:6'],
            'phone' => ['nullable', 'string', 'regex:/^\+\d{10,15}$/'],
        ]);

        $phone = $request->input('phone') ?? session('phone_for_otp');

        if (!$phone) {
            return response()->json(['success' => false, 'message' => 'Phone missing.'], 422);
        }

        $twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));

        try {
            $verification = $twilio->verify->v2->services(config('services.twilio.verify_sid'))
                ->verificationChecks
                ->create([
                    'to' => $phone,
                    'code' => $request->input('otp'),
                ]);
        } catch (\Exception $e) {
            Log::error('Twilio verifyOtp error: '.$e->getMessage());
            return response()->json(['success' => false, 'message' => 'Verification service error.'], 500);
        }

        if ($verification->status === 'approved') {
            // find or create user
            $user = User::firstOrCreate(
                ['phone' => $phone],
                [
                    'name' => 'User '.substr($phone, -4),
                    'email' => null,
                    'password' => null,
                ]
            );

            $user->phone_verified_at = now();
            $user->save();

            Auth::login($user);

            session()->forget('phone_for_otp');

            return response()->json(['success' => true, 'message' => 'Logged in successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Invalid OTP.'], 422);
    }
}

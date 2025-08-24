<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
                // Customize email verification URL to include redirect
            VerifyEmail::createUrlUsing(function ($notifiable) {
                $redirect = session('booking_redirect', route('customer.dashboard'));

                return URL::temporarySignedRoute(
                    'verification.verify',
                    now()->addMinutes(60),
                    [
                        'id' => $notifiable->id,
                        'hash' => sha1($notifiable->email),
                        'redirect' => $redirect
                    ]
                );
            });
    }
}

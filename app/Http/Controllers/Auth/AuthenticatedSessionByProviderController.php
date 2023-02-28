<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionByProviderController extends Controller
{
    public function redirectToProvider(string $provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Handle an incoming authentication request.
     */
    public function handleProviderCallback(string $provider): RedirectResponse
    {
        $providerUser = Socialite::driver($provider)->user();

        $user = User::firstOrCreate(
            [
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
            ],
            [
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
            ],
        );

        auth()->login($user, true);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}

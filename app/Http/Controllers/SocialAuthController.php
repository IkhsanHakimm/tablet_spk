<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        // Check if the user already exists
        $existingUser = User::where('email', $socialUser->getEmail())->first();
        if ($existingUser) {
            Auth::login($existingUser, true);
        } else {
            // Create a new user
            $newUser = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'avatar' => $socialUser->getAvatar(),
                'password' => Hash::make(uniqid()),  // Mengisi kolom password dengan nilai hash dari string acak
            ]);

            Auth::login($newUser, true);
        }

        return redirect('/home');
    }
}

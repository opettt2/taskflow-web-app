<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt('randompassword123')
            ]
        );

        Auth::login($user);

        //Create API token for the user
        $token = $user->createToken('api-token')->plainTextToken;
     
        //Return token to the dashboard
        return redirect()->route('dashboard')->with('api_token', $token);
    }
}

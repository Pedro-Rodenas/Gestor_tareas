<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    // Mostrar el formulario de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Login tradicional
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/tareas');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden.',
        ]);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    // Login con Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            ['name' => $googleUser->getName(), 'password' => bcrypt(str()->random(16))]
        );

        Auth::login($user, true);
        return redirect('/tareas');
    }

    // Login con Twitch
    public function redirectToTwitch()
    {
        return Socialite::driver('twitch')->redirect();
    }

    public function handleTwitchCallback()
    {
        $twitchUser = Socialite::driver('twitch')->stateless()->user();

        $user = User::firstOrCreate(
            ['email' => $twitchUser->getEmail() ?? $twitchUser->getId() . '@twitch.com'],
            ['name' => $twitchUser->getName() ?? 'TwitchUser', 'password' => bcrypt(str()->random(16))]
        );

        Auth::login($user, true);
        return redirect('/tareas');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Login
     */
    public function login(Request $request) {
        try {
            $response = Http::post(config('app.backend_url').config('api.login'), [
                'email' => $request->email,
                'password' => $request->password
            ]);

            // Success
            if ($response->ok()) {
                // Save token in to session
                $data = \json_decode($response->body());
                Session::put('email', $data->email);
                Session::put('access_token', $data->accessToken);

                return redirect()->back()
                    ->with('success', 'Welcome to City Tours');
            }

            // Failed
            if ($response->failed()) {
                return redirect()->back()
                    ->with('function', 'login')
                    ->with('error', trans('auth.failed'));
            }

            if ($response->serverError() || $response->failed()) {
                return redirect()->back()->with('error', 'Internal Server Error');
            }
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Server Connection Error');
        }
    }

    /**
     * Login by Google account
     */
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle after login successfully by Google account
     */
    public function handleGoogleCallback() {
        try {
            // Save Google account
            $user = Socialite::driver('google')->user();
            $response = Http::post(config('app.backend_url').config('api.login_google'), [
                            'email' => $user->email,
                            'google_id' => $user->id
            ]);

            if ($response->ok()) {
                $data = \json_decode($response->body());
                Session::put('email', $data->email);
                Session::put('access_token', $data->accessToken);

                return redirect()->route('home')
                    ->with('success', 'Welcome to City Tours');
            }

            if ($response->failed()) {
                return redirect()->route('home')
                    ->with('function', 'login')
                    ->with('error', trans('auth.failed'));
            }

            if ($response->serverError() || $response->failed()) {
                return redirect()->route('home')->with('error', 'Internal Server Error');
            }

        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', trans('message.error_system'));
        }
    }

    /**
     * Logout
     */
    public function logout() {
        // Destroy all session
        Session::forget(['access_token', 'email']);

        return redirect()->back()->with('success', 'Signed out');;
    }
}

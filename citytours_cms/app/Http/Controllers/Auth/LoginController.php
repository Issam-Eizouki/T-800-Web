<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller {
    
    public function view() {
        if (Session::has('access_token')) {
            return redirect()->route('home');
        }
        
        return view('auth.login');
    }
    
    public function login(Request $request) {
        try {
            $response = Http::post(config('app.backend_url').config('api.login'), [
                'email' => $request->email,
                'password' => $request->password
            ]);
            
            if ($response->ok()) {
                $data = \json_decode($response->body());
                Session::put('email', $data->email);
                Session::put('access_token', $data->accessToken);
                return redirect()->route('home')->with('success', 'Hello '.strtoupper($data->email));
            }
            
            if ($response->unauthorized()) {
                return redirect()->back()->with('error', trans('auth.failed'));
            }
            
            if ($response->serverError() || $response->failed()) {
                return redirect()->back()->with('error', 'Internal Server Error');
            }
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Server Connection Error');
        }
    }
    
    public function redirectToGoogle() {
        return Socialite::driver('google')->redirect();
    }
    
    public function handleGoogleCallback() {
        try {
            // google account
            $user = Socialite::driver('google')->user();

            $response = Http::post(config('app.backend_url').config('api.login_google'), [
                'email' => $user->email,
                'google_id' => $user->id
            ]);
            
            if ($response->ok()) {
                $data = \json_decode($response->body());
                Session::put('email', $data->email);
                Session::put('access_token', $data->accessToken);
                return redirect()->route('home')->with('success', 'Hello '.strtoupper($data->email));
            }
            
            if ($response->unauthorized()) {
                return redirect()->route('login')->with('error', trans('auth.failed'));
            }
            
            if ($response->serverError() || $response->failed()) {
                return redirect()->route('login')->with('error', 'Internal Server Error');
            }
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', trans('message.error_system'));
        }
    }
    
    public function logout() {
        Session::forget(['access_token', 'email']);
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    /**
     * Register
     */
    public function register(Request $request) {
        try {
            $response = Http::post(config('app.backend_url').config('api.register'), [
                'email' => $request->email,
                'password' => $request->password
            ]);

            // Success
            if ($response->ok()) {
                $data = \json_decode($response->body());
                Session::put('email', $data->email);
                Session::put('access_token', $data->accessToken);

                return redirect()->back()
                    ->with('function', 'login')
                    ->with('success', 'Register successfully!');
            }

            // Failed
            if ($response->failed()) {
                $data = \json_decode($response->body(), true);
                return redirect()->back()
                    ->withInput($request->except('password'))
                    ->with('function', 'register')
                    ->with('error', $data[array_keys($data)[0]]);
            }

            if ($response->serverError() || $response->failed()) {
                return redirect()->back()
                    ->withInput($request->except('password'))
                    ->with('function', 'register')
                    ->with('error', 'Internal Server Error');
            }
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Server Connection Error');
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Http;

class PasswordController extends Controller
{
    /**
     * Create token and send reset password email
     */
    public function forgot(Request $request) {
        try {
            // Create token
            $response = Http::post(config('app.backend_url').config('api.password_forget'), [
                'email' => $request->email,
            ]);

            // Success
            if ($response->ok()) {
                // Send reset password email
                $data = \json_decode($response->body());
                Mail::to($request->email)->send(new ResetPasswordMail($data->token));

                return redirect()->back()
                    ->with('success', 'We sent the reset link into your email !');
            }

            // Failed
            if ($response->failed()) {
                $data = \json_decode($response->body(), true);
                return redirect()->back()
                    ->withInput()
                    ->with('function', 'forgot')
                    ->with('error', $data[array_keys($data)[0]]);
            }

            if ($response->serverError() || $response->failed()) {
                return redirect()->back()
                    ->withInput()
                    ->with('function', 'forgot')
                    ->with('error', 'Internal Server Error');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('message.error_system'));
        }
    }

    /**
     * Reset password page
     */
    public function viewResetPage(Request $request) {
        // Check invalid reset token
        if (!$request->has('token')) {
            abort(404);
        }

        // Get user account from the reset token
        try {
            $response = Http::get(config('app.backend_url').config('api.password_reset'), [
                'token' => $request->token,
            ]);

            // Success - Show reset password page
            if ($response->ok()) {
                $data = \json_decode($response->body());

                return view('auth.reset', array(
                    'email' => $data->email
                ));
            }

            // Failed
            if ($response->serverError() || $response->failed()) {
                $data = \json_decode($response->body(), true);
                return redirect()->route('home')
                    ->with('function', 'forgot')
                    ->with('error', 'Invalid token. Try again!');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('message.error_system'));
        }
    }

    /**
     * Reset new password
     */
    public function reset(Request $request) {
        try {
            $response = Http::put(config('app.backend_url').config('api.password_reset'), [
                'email' => $request->email,
                'password' => $request->password,
                'token' => $request->reset_token,
            ]);

            // Success
            if ($response->ok()) {
                return redirect()->route('home')
                    ->with('function', 'login')
                    ->with('success', 'Change password successfully. Sign in again!');
            }

            // Failed
            if ($response->failed()) {
                $data = \json_decode($response->body(), true);
                return redirect()->back()->with('error', $data[array_keys($data)[0]]);
            }

            if ($response->serverError()) {
                return redirect()->back()->with('error', 'Internal Server Error');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', trans('message.error_system'));
        }
    }
}

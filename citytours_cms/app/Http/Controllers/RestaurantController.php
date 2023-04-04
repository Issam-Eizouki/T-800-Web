<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class RestaurantController extends Controller
{
    public function viewAll(Request $request) {
        if (!$request->city) {
            return view('cms.restaurants', ['restaurants' => null]);
        }

        try {
            $response = Http::withToken(Session::get('access_token'))
                ->get(config('app.backend_url').config('api.restaurant'), array(
                    'city' => $request->city,
                    'limit' => 100,
            ));

            if ($response->ok()) {
                $data = \json_decode($response->body());
                return view('cms.restaurants', array(
                    'restaurants' => $data
                ));
            }

            if ($response->forbidden()) {
                return redirect()->route('login')->with('error', trans('auth.failed'));
            }

            if ($response->serverError() || $response->failed()) {
                return redirect()->back()->with('error', 'Internal Server Error');
            }
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Server Connection Error');
        }
    }

    public function view(string $id, Request $request) {
        $data = $this->data();
        return view('cms.restaurant', array(
            'restaurant' => $data
        ));

        try {
            $response = Http::withToken(Session::get('access_token'))
            ->get(config('app.backend_url').config('api.restaurant').'/'.$id);

            if ($response->ok()) {
                $data = \json_decode($response->body());
                return view('cms.restaurant', array(
                    'restaurant' => $data
                ));
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

    public function update(Request $request) {
        $data = $request->except('_token');
        return redirect()->back()->with('success', 'Success');

        /* TODO: post to api
         $response = Http::post(config('app.backend_url').config('api.restaurant'), [
         'email' => $request->email,
         'password' => $request->password
         ]);

         if ($response->ok()) {
         return redirect()->back()->with('success', 'Success');
         }

         if ($response->unauthorized()) {
         return redirect()->back()->with('error', trans('auth.failed'));
         }

         if ($response->serverError() || $response->failed()) {
         return redirect()->back()->with('error', 'Internal Server Error');
         }
         */
    }

    private function data() {
        return (object) array(
            'place_id' => 'GyuEmsRBfy61i59si0',
            'name' => 'Place A',
            'address' => '48 Pirrama Rd, Pyrmont NSW 2009, Australia',
            'photos' => [
                'http://citytours.com/storage/001.png',
                'http://citytours.com/storage/002.png'
            ]
        );
    }
    private function list() {
        $obj = (object) array(
            'place_id' => 'GyuEmsRBfy61i59si0',
            'name' => 'Place A',
            'address' => '48 Pirrama Rd, Pyrmont NSW 2009, Australia',
            'photos' => [
                'http://citytours.com/storage/001.png',
                'http://citytours.com/storage/002.png'
            ]
        );
        return [
            $obj, $obj
        ];
    }
}

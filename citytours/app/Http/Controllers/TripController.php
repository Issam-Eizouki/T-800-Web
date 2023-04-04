<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TripController extends Controller
{
    public function show() {
        return view('trip.index', array());
    }

    public function getDirection(Request $request) {
        if (!$request->origin || !$request->destination) {
            return redirect()->back()->withInput()->with('error', 'The cities are empty.');
        }

        // $data = $this::getDataFromApi($request->origin, $request->destination);
        // if (!$data) {
        //     return redirect()->back()->withInput()->with('error', 'Can not find direction.');
        // }

        return redirect()->back()->withInput()->with('direction', 'asdf');
    }

    public static function getDataFromApi(string $origin, string $destination) {
        // TODO: remove access token
        $response = Http::get(config('app.backend_url').config('api.travel'), array(
                'origin' => $origin,
                'destination' => $destination,
        ));

        if ($response->ok()) {
            return \json_decode($response->body());
        }

        if ($response->serverError() || $response->failed()) {
            Log::error($response->body());
            return null;
        }
    }
}

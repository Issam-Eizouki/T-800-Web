<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class RestaurantController extends Controller
{
    public function showAll(Request $request) {
        $offset = (int)$request->offset;
        $data = $this::getDataFromApi($request->city, 4, 4 * $offset);

        return view('restaurant.index', array(
            'restaurants' => $data,
            'offset' => $offset,
        ));
    }

    public function show(string $place) {
        return view('restaurant.place', array());
    }

    public static function getDataFromApi($city, int $limit = 3, int $offset = 0) {
        if (is_null($city)) {
            return null;
        }

        // TODO: remove access token
        $response = Http::withToken(Session::get('access_token'))
            ->get(config('app.backend_url').config('api.restaurant'), array(
                'city' => $city,
                'limit' => $limit,
                'offset' => $offset,
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show() {
        $restaurants = RestaurantController::getDataFromApi('strasbourg', 6);

        return view('home2', array(
            'restaurants' => $restaurants
        ));
    }
}

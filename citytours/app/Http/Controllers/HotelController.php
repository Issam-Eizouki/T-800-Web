<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function showAll() {
        return view('hotel.index', array());
    }
    
    public function show(string $place) {
        return view('hotel.place', array());
    }
}

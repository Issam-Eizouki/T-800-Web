<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarController extends Controller
{
    public function showAll() {
        return view('bar.index', array());
    }
    
    public function show(string $place) {
        return view('bar.place', array());
    }
}

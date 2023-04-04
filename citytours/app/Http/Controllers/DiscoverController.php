<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscoverController extends Controller
{
    public function showAll(Request $request) {
        if ($request->has('city')) {
            
        }
        
        return view('discover.index', array(
            'city' => $request->get('city'),
        ));
    }
    
    public function show() {
        return view('discover.place', array());
    }
}

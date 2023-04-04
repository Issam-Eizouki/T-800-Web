<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiscoverController extends Controller
{
    public function viewAll(Request $request) {
        if (!$request->city) {
            return view('cms.discovers', ['discovers' => null]);
        }
        
        // TODO: get from api
        $discovers = $this->list();
        
        return view('cms.discovers', array(
            'discovers' => $discovers
        ));
    }
    
    public function view(string $id, Request $request) {
        // TODO: get from api
        
        $discover = $this->data();
        
        return view('cms.discover', array(
            'discover' => $discover
        ));
    }
    
    public function update(Request $request) {
        $data = $request->except('_token');
        return redirect()->back()->with('success', 'Success');
        
        /* TODO: post to api
         $response = Http::post(config('app.backend_url').config('api.discover'), [
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

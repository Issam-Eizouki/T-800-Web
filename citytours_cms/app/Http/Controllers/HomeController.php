<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function show(Request $request) {
        return view('cms.home', array());
    }
    
    public function getByAjax() {
        $response = Http::withToken(Session::get('access_token'))->get(config('app.backend_url').config('api.users'));
        
        return $response->body();
    }
    
    private function data() {
        return [
            (object) array(
                'id' => '1',
                'email' => 'user1@abc.com',
                'roles' => [
                    (object) array(
                        'id' => '1',
                        'name' => 'admin',
                    ),
                    (object) array(
                        'id' => '2',
                        'name' => 'user',
                    )
                ]
            ),
            (object) array(
                'id' => '2',
                'email' => 'user2@abc.com',
                'google_id' => 'Adlke2gu943',
                'roles' => [
                    (object) array(
                        'id' => '2',
                        'name' => 'user',
                    )
                ]
            ),
            (object) array(
                'id' => '3',
                'email' => 'user3@abc.com',
                'google_id' => 'Adlke2gu943',
                'roles' => [
                    (object) array(
                        'id' => '2',
                        'name' => 'user',
                    )
                ]
            )
        ];
    }
}

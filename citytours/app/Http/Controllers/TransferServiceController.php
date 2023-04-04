<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class TransferServiceController extends Controller
{
    public function showAll() {
        return view('transfer.index', array());
    }

    public function showService() {
        if (!Session::has('access_token')) {
            return redirect()->back()->with('function', 'login')
                ->with('info', 'Please login before booking our service!');
        }

        return view('transfer.service', array(
            'airports' => $this::getAirportsFromApi(),
        ));
    }

    public function bookService(Request $request) {
        $cart = $request->except('_token');
        // Customize
        $airports = $this::getAirportsFromApi();
        foreach ($airports as $ap) {
            if ($ap->id == $cart['pickup']) {
                $cart['pickup_name'] = $ap->name;
            }
        }
        $cart['total'] = 40 * (int)$cart['adults'] + 20 * (int)$cart['children'];

        // Keep in session
        Session::put('cart', $cart);

        return redirect()->route('transfers.cart');
    }

    public function showCart() {
        // Check cart
        if (!Session::has('cart')) {
            return redirect()->route('transfer.service')->with('error', 'You do not any booking!');
        }

        $cart = Session::get('cart');
        return view('transfer.cart', array(
            'cart' => $cart,
        ));
    }

    public function deleteCart() {
        Session::forget('cart');
        return redirect()->route('transfers.service')->with('info', 'Your booking is deleted!');
    }

    public function showPayment() {
        $cart = Session::get('cart');
        return view('transfer.payment', array(
            'cart' => $cart,
        ));
    }

    public function makePayment(Request $request) {
        $cart = Session::get('cart');
        $response = Http::withToken(Session::get('access_token'))
            ->post(config('app.backend_url').config('api.transaction'), [
                'transaction_id' => $request->trsPayment,
                'datetime' => $cart['date'].' '.$cart['time'],
                'pickup_id' => $cart['pickup'],
                'adults' => $cart['adults'],
                'children' => $cart['children'],
                'cost' => $cart['total'],
        ]);

        if ($response->ok()) {
            Session::forget(['cart']);
            return view('transfer.complete', array(
                'cart' => $cart
            ));
        }

        if ($response->serverError() || $response->failed()) {
            Log::error($response->body());
            return redirect()->back()->with('error', 'Create payment error, please contact our customer service!');
        }
    }

    public function showCompletedBooking() {
        $response = Http::withToken(Session::get('access_token'))
            ->get(config('app.backend_url').config('api.transactions'));

        $data = null;
        if ($response->ok()) {
            $data = \json_decode($response->body());
        }

        return view('transfer.complete', array(
            'transactions' => $data,
        ));
    }



    public static function getAirportsFromApi() {
        // TODO: remove access token
        $response = Http::withToken(Session::get('access_token'))
            ->get(config('app.backend_url').config('api.airports'));

        if ($response->ok()) {
            return \json_decode($response->body());
        }

        if ($response->serverError() || $response->failed()) {
            Log::error($response->body());
            return null;
        }
    }
}

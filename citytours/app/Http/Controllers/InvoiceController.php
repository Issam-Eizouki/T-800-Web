<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function showTransferInvoice() {
        return view('invoice.transfer');
    }
}

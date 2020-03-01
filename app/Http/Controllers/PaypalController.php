<?php

namespace Crater\Http\Controllers;

use Crater\Invoice;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentPage($invoiceId) {
        $invoice = Invoice::with([
            'items',
            'items.taxes',
            'user',
            'invoiceTemplate',
            'taxes'
        ])
        ->where('unique_hash', $invoiceId)
        ->first();

        return view('app/payment/paypal')
            ->with('invoice', $invoice);
    }
}

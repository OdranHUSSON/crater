<?php

namespace Crater\Http\Controllers;

use Crater\Invoice;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{

    /**
     * @param $invoiceId
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    protected function getInvoice($invoiceId) {
        $invoice = Invoice::with([
            'items',
            'items.taxes',
            'user',
            'invoiceTemplate',
            'taxes'
        ])
        ->where('unique_hash', $invoiceId)->first();

        return $invoice;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentPage($invoiceId)
    {
        $invoice = $this->getInvoice($invoiceId);

        return view('app/payment/paypal')
            ->with('invoice', $invoice);
    }

    public function paymentRedirection($invoiceId)
    {
        $provider = new ExpressCheckout;

        $invoice = $this->getInvoice($invoiceId);

        $data = [];

        foreach ($invoice->items as $item) {
            $data['items'][] = [
                'name' => $item->name,
                'price' => $item->price/100,
                'desc'  => $item->description,
                'qty' => $item->quantity
            ];
        }

        $data['invoice_id'] = $invoice->invoice_number;
        $data['invoice_description'] = $invoice->invoice_number . ' ' . $invoice->user->name;
        $data['return_url'] = url('/payment/success');
        $data['cancel_url'] = url('/payment/cancel');

        $total = 0;
        foreach ($data['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $data['total'] = $total;


        if($invoice->discount_type === "fixed" && $invoice->discount != 0) {
            $data['shipping_discount'] = $invoice->discount;
        } elseif ($invoice->discount_type === "percentage") {
            $data['shipping_discount'] = round(($invoice->discount / 100) * $total, 2);
        }

        $response = $provider->setExpressCheckout($data);
        
        return redirect($response['paypal_link']);
    }
}

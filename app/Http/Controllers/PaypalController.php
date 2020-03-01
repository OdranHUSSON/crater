<?php

namespace Crater\Http\Controllers;

use Carbon\Carbon;
use Crater\CompanySetting;
use Crater\Invoice;
use Crater\Payment;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Validator;

class PaypalController extends Controller
{

    const COMPANY_ID = 1;

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
     * @param $invoiceId
     *
     * @return mixed
     */
    protected function getPaymentByInvoiceId($invoiceId) {
        $payment = Payment::where('notes', $invoiceId)->first();

        return $payment;
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

    /**
     * @param $invoiceId
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
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
        $data['return_url'] = url('/payment/success/invoice/' . $invoiceId . '/');
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

    /**
     * @param Request $request
     *
     * @throws \Exception
     */
    public function paymentIPN(Request $request)
    {
        $provider = new ExpressCheckout;

        $request->merge(['cmd' => '_notify-validate']);
        $post = $request->all();

        $response = (string) $provider->verifyIPN($post);

        if ($response === 'VERIFIED') {
            // @TODO
        }
    }

    /**
     * @param $invoiceId
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function paymentSuccess($invoiceId) {
        $invoice = $this->getInvoice($invoiceId);

        $this->storePayment($invoiceId);

        return view('app/payment/success')
            ->with('invoice', $invoice)
            ->with('total', round($invoice->total/100))
            ->with('cents', substr($invoice->total, -2));
    }

    /**
     * @param $invoiceId
     */
    protected function storePayment($invoiceId) {

        if ($this->getPaymentByInvoiceId($invoiceId) === NULL) {
            $invoice = $this->getInvoice($invoiceId);
            $payment_prefix = CompanySetting::getSetting('payment_prefix', $this::COMPANY_ID);
            $payment_number = Payment::getNextPaymentNumber($payment_prefix);
            $payment_date = Carbon::createFromFormat('d/m/Y', date('d/m/Y'));
            $invoice->status = Invoice::STATUS_COMPLETED;
            $invoice->paid_status = Invoice::STATUS_PAID;
            $invoice->due_amount = 0;
            $invoice->save();

            $payment = Payment::create([
                'payment_date' => $payment_date,
                'payment_number' => $payment_prefix . '-' .$payment_number,
                'user_id' => $invoice->user->id,
                'company_id' => $this::COMPANY_ID,
                'invoice_id' => $invoice->id,
                'payment_method_id' => 9,
                'amount' => $invoice->total,
                'notes' => $invoice->unique_hash,
                'unique_hash' => str_random(60)
            ]);
        }
    }
}

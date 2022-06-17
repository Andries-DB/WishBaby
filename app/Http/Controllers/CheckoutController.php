<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Mollie\Laravel\Facades\Mollie;

class CheckoutController extends Controller
{
    public function checkout(Request $request) {
        $cart = Cart::session(1);
        $total = $cart->getTotal();

        //create new order
        $order = new Order();
        $order->name = $request->name;
        $order->remarks = $request->remarks;
        $order->wishlist_id = $request->wishlist;
        $order->total = $total;
        $order->status = 'pending';


        $webhookURL = route('webhooks.mollie');
        if (App::environment('local')) {
            $webhookURL = 'https://7306-185-194-187-34.eu.ngrok.io/webhooks/mollie';
        };
        $order->save();
        $total = number_format($total,2);
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $total // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Bestelling op " . date('d-m-Y h:i'),
            "redirectUrl" => route('checkout.success'),
            "webhookUrl" => $webhookURL,
            "metadata" => [
                "order_id" => $order->id,
            ],
        ]);


        return redirect($payment->getCheckoutUrl(),303);
    }

    public function success() {
        Cart::session(1)->clear();
        return 'Jouw bestelling is goed binnengekomen';
    }
}

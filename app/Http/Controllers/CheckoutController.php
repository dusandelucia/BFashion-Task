<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function success(Request $request)
    {
        $order = new Order();

        $order->total_product_value = $request->input('price');
        $order->total_shipping_value = $request->input('shipping_option');
        $order->client_name = $request->input('client_name');
        $order->client_address = $request->input('client_address');

        $order->save();

        return view('checkout_success');
    }
}

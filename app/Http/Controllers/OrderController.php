<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request) {
        $order_id = $request->get('id');
        $order = Order::find($order_id);

        

       $data = [
           'order' => $order,
           'products' => $order->products, // Fetch related products
       ];

        return view('order.view', $data);
    }


}

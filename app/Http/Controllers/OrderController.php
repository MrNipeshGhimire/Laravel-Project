<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        $order = Orders::with('products','user')->get();
        $shipping = Shipping::latest()->get();
        return view('admin.order.index', compact('order','shipping'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function success()
    {
        $user_id = Auth::id();
        $orders = Order::where('user_id', $user_id)->with('orderItems.product')->get();
        return view('checkout.success', compact('orders'));
    }
    
}

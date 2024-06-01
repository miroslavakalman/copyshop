<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function destroy($id)
    {
        $order = Order::find($id);

        if ($order && $order->user_id == Auth::id()) {
            $order->orderItems()->delete();
            $order->delete();

            return redirect()->route('checkout.success')->with('success', 'Заказ успешно удален.');
        }

        return redirect()->route('checkout.success')->with('error', 'Вы не можете удалить этот заказ.');
    }
    public function placeOrder(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $order = new Order();
        $order->user_id = auth()->id();
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->save();

        $cart = session('cart');
        foreach ($cart as $id => $details) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $id;
            $orderItem->quantity = $details['quantity'];
            $orderItem->price = $details['price'];
            $orderItem->save();
        }

        session()->forget('cart');

        return redirect()->route('products.index')->with('success', 'Заказ успешно оформлен!');
    }
}

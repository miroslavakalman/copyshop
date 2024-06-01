<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $cartItems = Cart::where('user_id', Auth::id())->get();

        $total = 0;
        foreach ($cartItems as $cartItem) {
            $total += $cartItem->product->price * $cartItem->quantity;
        }

        $order = new Order();
        $order->user_id = Auth::id();
        $order->address = $request->input('address');
        $order->phone = $request->input('phone');
        $order->total = $total;
        $order->save();

        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($product->quantity < $cartItem->quantity) {
                return redirect()->back()->withErrors(['error' => 'Недостаточно товара на складе для '.$product->name]);
            }

            $product->quantity -= $cartItem->quantity;
            $product->save();

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->price = $cartItem->product->price;
            $orderItem->save();
        }

        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('checkout.success');
    }

    public function add(Request $request)
    {
        try {
            $user_id = Auth::id();
            if (!$user_id) {
                throw new \Exception('User is not authenticated');
            }

            $product_id = $request->input('product_id');
            $product = Product::find($product_id);
            if (!$product) {
                throw new \Exception('Product not found');
            }

            $cartItem = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

            if ($cartItem) {
                $cartItem->quantity += 1;
            } else {
                $cartItem = new Cart();
                $cartItem->user_id = $user_id;
                $cartItem->product_id = $product_id;
                $cartItem->quantity = 1;
            }

            $cartItem->save();

            return response()->json(['success' => 'Товар добавлен в корзину!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Произошла ошибка: ' . $e->getMessage()], 500);
        }
    }

    public function index()
    {
        $user_id = Auth::id();
        $cartItems = Cart::where('user_id', $user_id)->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    public function remove($product_id)
    {
        $user_id = Auth::id();
        $cartItem = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Товар удален из корзины');
    }

    public function increase($product_id)
    {
        $user_id = Auth::id();
        $cartItem = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        }

        return redirect()->route('cart.index');
    }

    public function decrease($product_id)
    {
        $user_id = Auth::id();
        $cartItem = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($cartItem && $cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
        } elseif ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index');
    }
}

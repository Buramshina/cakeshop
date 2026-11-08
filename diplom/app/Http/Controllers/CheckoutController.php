<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct(private CartService $cart)
    {
    }

    public function index()
    {
        if ($this->cart->isEmpty()) {
            return redirect()->route('cart.index');
        }

        return view('checkout', [
            'cartItems' => $this->cart->items(),
            'cartCount' => $this->cart->count(),
            'cartTotal' => $this->cart->total(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:32'],
            'email' => ['nullable', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:500'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ]);

        if ($this->cart->isEmpty()) {
            return back()->withErrors(['cart' => 'Корзина пуста']);
        }

        $items = $this->cart->items();

        $order = Order::create([
            'customer_name' => $validated['name'],
            'customer_phone' => $validated['phone'],
            'customer_email' => $validated['email'] ?? null,
            'delivery_address' => $validated['address'],
            'comment' => $validated['comment'] ?? null,
            'total' => $this->cart->total(),
            'status' => 'new',
        ]);

        foreach ($items as $item) {
            $order->items()->create([
                'product_id' => $item['product']->id,
                'product_name' => $item['product']->name,
                'quantity' => $item['quantity'],
                'price' => $item['product']->price,
            ]);
        }

        $orderNumber = $order->id;
        $this->cart->clear();

        return redirect()->route('checkout.success')->with('order', $orderNumber);
    }

    public function success()
    {
        $orderNumber = session('order');

        if (! $orderNumber) {
            return redirect()->route('home');
        }

        return view('checkout-success', compact('orderNumber'));
    }
}
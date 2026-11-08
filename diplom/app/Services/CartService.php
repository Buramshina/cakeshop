<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;

class CartService
{
    public const KEY = 'cart';

    public function __construct()
    {
        if (! session()->has(self::KEY)) {
            session()->put(self::KEY, []);
        }
    }

    public function add(Product $product, int $quantity = 1): void
    {
        $cart = session(self::KEY, []);
        $quantity = max(1, $quantity);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
            ];
        }

        session()->put(self::KEY, $cart);
    }

    public function update(int $productId, int $quantity): void
    {
        $cart = session(self::KEY, []);
        $quantity = max(1, $quantity);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $quantity;
            session()->put(self::KEY, $cart);
        }
    }

    public function remove(int $productId): void
    {
        $cart = session(self::KEY, []);
        unset($cart[$productId]);
        session()->put(self::KEY, $cart);
    }

    public function clear(): void
    {
        session()->forget(self::KEY);
    }

    /**
     * @return Collection<int, array{product: Product, quantity: int}>
     */
    public function items(): Collection
    {
        $cart = session(self::KEY, []);
        $ids = array_keys($cart);

        if (empty($ids)) {
            return collect();
        }

        $products = Product::whereIn('id', $ids)
            ->where('is_active', true)
            ->get()
            ->keyBy('id');

        return collect($cart)
            ->map(function (array $item) use ($products) {
                $product = $products->get($item['product_id']);

                if (! $product) {
                    return null;
                }

                return [
                    'product' => $product,
                    'quantity' => $item['quantity'],
                ];
            })
            ->filter()
            ->values();
    }

public function count(): int
{
    return $this->items()->sum(function ($item) {
        return $item['quantity'];
    });
}

public function total(): float
{
    return $this->items()->sum(function ($item) {
        return $item['price'] * $item['quantity'];
    });
}

    public function isEmpty(): bool
    {
        return $this->items()->isEmpty();
    }
}
@php
    $cart = app(\App\Services\CartService::class);
    $cartItems = $cart->items();
    $cartTotal = $cart->total();
@endphp
<aside class="cart-drawer" aria-label="Корзина" id="cart-drawer">
  <div class="cart-drawer-head">
    <h3>Ваша корзина ({{ $cart->count() }})</h3>
    <button class="cart-drawer-close" aria-label="Закрыть"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M6 6l12 12M18 6 6 18"/></svg></button>
  </div>
  <div class="cart-drawer-body" id="cart-drawer-body">
    @forelse($cartItems as $item)
      <div class="cart-line" data-cart-item="{{ $item['product']->id }}">
        @include('partials.placeholder', ['ph' => $item['product']->image ?: 'ph-1', 'large' => false])
        <div>
          <div class="cart-line-name">{{ $item['product']->name }}</div>
          <div class="cart-line-meta">
            @if($item['product']->weight){{ $item['product']->weight }} кг · @endif{{ $item['quantity'] }} шт
          </div>
          <form action="{{ route('cart.remove') }}" method="POST" class="inline-form">
            @csrf
            <input type="hidden" name="product_id" value="{{ $item['product']->id }}">
            <button class="cart-line-remove" type="submit">Удалить</button>
          </form>
        </div>
        <div class="cart-line-price">{{ number_format($item['product']->price * $item['quantity'], 0, '', ' ') }} ₽</div>
      </div>
    @empty
      <div class="cart-drawer-empty">В корзине пока пусто</div>
    @endforelse
  </div>
  <div class="cart-drawer-foot" @if($cartItems->isEmpty()) style="display:none" @endif>
    <div class="cart-total-row"><span>Итого</span><span id="cart-total">{{ number_format($cartTotal, 0, '', ' ') }} ₽</span></div>
    <a href="{{ route('cart.index') }}" class="btn btn-primary btn-block">Оформить заказ</a>
  </div>
</aside>
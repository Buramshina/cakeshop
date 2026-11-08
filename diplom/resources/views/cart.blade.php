@extends('layouts.app')

@section('title', 'Корзина')

@section('content')

<main class="container cart-page">
  <nav class="breadcrumbs">
    <a href="{{ route('home') }}">Главная</a><span class="sep">/</span><span class="current">Корзина</span>
  </nav>
  <h1>Корзина</h1>

  <div class="cart-page-grid">
    <div class="cart-table">
      @forelse($cartItems as $item)
        <div class="cart-row" data-cart-item="{{ $item['product']->id }}">
          <div style="grid-column:1;width:84px">
            @include('partials.placeholder', ['ph' => $item['product']->image ?: 'ph-1'])
          </div>
          <div>
            <a href="{{ route('product.show', $item['product']) }}" class="cart-row-name">{{ $item['product']->name }}</a>
            <div class="cart-row-meta">
              @if($item['product']->weight){{ $item['product']->weight }} кг · @endif{{ $item['quantity'] }} шт
            </div>
          </div>
          <div class="qty-stepper" data-product-id="{{ $item['product']->id }}">
            <button type="button" data-qty="minus" aria-label="Уменьшить количество">−</button>
            <input type="text" inputmode="numeric" value="{{ $item['quantity'] }}" aria-label="Количество" class="js-cart-qty">
            <button type="button" data-qty="plus" aria-label="Увеличить количество">+</button>
          </div>
          <div class="cart-row-price js-cart-price">{{ number_format($item['product']->price * $item['quantity'], 0, '', ' ') }} ₽</div>
          <button class="cart-line-remove cart-row-remove js-cart-remove" data-product-id="{{ $item['product']->id }}" aria-label="Удалить товар">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M9 7V4h6v3M6 7l1 13h10l1-13"/></svg>
          </button>
        </div>
      @empty
        <div class="cart-empty">
          <div class="ph ph-4"><svg viewBox="0 0 64 64" fill="none" stroke="#7A3B44" stroke-width="3"><path d="M32 46c-14 0-18-16-4-16 0-10 22-10 22 0 14 0 10 16-4 16Z"/></svg></div>
          <p>Ваша корзина пуста</p>
          <a href="{{ route('catalog') }}" class="btn btn-primary" style="margin-top:16px">Перейти в каталог</a>
        </div>
      @endforelse

      @if($cartItems->isNotEmpty())
        <p style="margin-top:24px"><a href="{{ route('catalog') }}" class="link-arrow">← Продолжить покупки</a></p>
      @endif
    </div>

    @if($cartItems->isNotEmpty())
      <aside class="summary-card">
        <h3>Сумма заказа</h3>
        <div class="summary-row"><span>Товары ({{ $cartCount }})</span><span>{{ number_format($cartTotal, 0, '', ' ') }} ₽</span></div>
        <div class="summary-row"><span>Доставка</span><span>от 300 ₽</span></div>
        <div class="summary-row total"><span>Итого</span><span>{{ number_format($cartTotal, 0, '', ' ') }} ₽</span></div>
        <form action="{{ route('checkout.index') }}" method="GET">
          <button type="submit" class="btn btn-primary btn-block" style="margin-top:18px">Оформить заказ</button>
        </form>
      </aside>
    @endif
  </div>
</main>

@endsection
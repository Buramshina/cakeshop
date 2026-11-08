@extends('layouts.app')

@section('title', $product->name . '')
@section('meta_description', $product->description)

@section('content')

<main class="container">
  <nav class="breadcrumbs">
    <a href="{{ route('home') }}">Главная</a><span class="sep">/</span>
    <a href="{{ route('catalog') }}">Каталог</a><span class="sep">/</span>
    <a href="{{ route('catalog', ['category' => $product->category->slug]) }}">{{ $product->category->name }}</a><span class="sep">/</span>
    <span class="current">{{ $product->name }}</span>
  </nav>

  <div class="product-detail">
    <div class="main-photo">
      @include('partials.placeholder', ['ph' => $product->image ?: 'ph-1', 'alt' => $product->name])
    </div>

    <div class="pd-info">
      <h1>{{ $product->name }}</h1>
      <div class="pd-price">{{ number_format($product->price, 0, '', ' ') }} ₽</div>
      <p class="pd-desc">{{ $product->description }}</p>

      @if($product->weight)
        <div class="option-group">
          <h4>Вес</h4>
          <div class="pill-row">
            <span class="pill">{{ $product->weight }} кг</span>
          </div>
        </div>
      @endif

      <div class="pd-actions">
        <div class="qty-stepper">
          <button type="button" data-qty="minus" aria-label="Уменьшить количество">−</button>
          <input type="text" inputmode="numeric" value="1" aria-label="Количество" id="qty-input">
          <button type="button" data-qty="plus" aria-label="Увеличить количество">+</button>
        </div>
        <button class="btn btn-primary js-add-to-cart" data-product-id="{{ $product->id }}">Добавить в корзину</button>
        <button class="pd-wishlist" aria-label="В избранное"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s-7-4.4-9.8-8.6C.6 9 2 5.3 5.3 4.4 7.6 3.8 9.8 5 12 7.6 14.2 5 16.4 3.8 18.7 4.4 22 5.3 23.4 9 21.8 12.4 19 16.6 12 21 12 21Z"/></svg></button>
      </div>

      <div class="pd-badges">
        <div class="pd-badge">
          <div class="icon-wrap"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v6M8 6l4-4 4 4"/><path d="M4 14c0-4 4-6 8-6s8 2 8 6v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-4Z"/></svg></div>
          Натуральные ингредиенты
        </div>
        <div class="pd-badge">
          <div class="icon-wrap"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3v3m0 0c-3 0-5 2-5 5v9h10v-9c0-3-2-5-5-5Z"/></svg></div>
          Ручная работа
        </div>
        <div class="pd-badge">
          <div class="icon-wrap"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 3"/></svg></div>
          Доставка от 2 часов
        </div>
        <div class="pd-badge">
          <div class="icon-wrap"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v6H4zM4 14h16v6H4z"/></svg></div>
          Хранение до 72 часов
        </div>
      </div>
    </div>
  </div>

  @if($related->isNotEmpty())
    <section class="section">
      <div class="bestsellers-title"><h2>Похожие товары</h2></div>
      <div class="product-grid">
        @foreach($related as $item)
          @include('partials.product-card', ['product' => $item])
        @endforeach
      </div>
    </section>
  @endif
</main>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const qtyInput = document.getElementById('qty-input');
  const addBtn = document.querySelector('.js-add-to-cart[data-product-id]');
  if (addBtn && qtyInput) {
    addBtn.dataset.quantity = qtyInput.value;
    qtyInput.addEventListener('change', () => { addBtn.dataset.quantity = qtyInput.value; });
  }
});
</script>
@endpush
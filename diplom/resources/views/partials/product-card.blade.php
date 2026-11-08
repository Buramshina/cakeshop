<article class="product-card">
  <button class="wishlist-btn" aria-label="В избранное"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 21s-7-4.4-9.8-8.6C.6 9 2 5.3 5.3 4.4 7.6 3.8 9.8 5 12 7.6 14.2 5 16.4 3.8 18.7 4.4 22 5.3 23.4 9 21.8 12.4 19 16.6 12 21 12 21Z"/></svg></button>
  <a href="{{ route('product.show', $product) }}">
    @include('partials.placeholder', ['ph' => $product->image ?: 'ph-1'])
  </a>
  <a href="{{ route('product.show', $product) }}" class="product-name">{{ $product->name }}</a>
  @isset($product->weight)
    <div class="product-meta">{{ $product->weight }} кг</div>
  @endisset
  <div class="product-foot">
    <span class="product-price">{{ number_format($product->price, 0, '', ' ') }} ₽</span>
    <button class="add-btn js-add-to-cart" data-product-id="{{ $product->id }}" aria-label="В корзину"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M12 5v14M5 12h14"/></svg></button>
  </div>
</article>
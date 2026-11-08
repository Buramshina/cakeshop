@php
    $cart = app(\App\Services\CartService::class);
    $cartCount = $cart->count();
    $user = auth()->user();          // ← вот замена current_user()
@endphp

<header class="site-header">
  <div class="header-inner">
    <a href="{{ route('home') }}" class="logo">Cake Atelier</a>

    <nav class="main-nav">
      <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Главная</a>
      <a href="{{ route('catalog') }}" class="{{ request()->routeIs('catalog') ? 'active' : '' }}">Каталог</a>
      <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">О нас</a>

      @auth
                @if($user->role === 'baker')
                    <a href="{{ route('baker.dashboard') }}">Мой кабинет</a>
                @endif
                
                @if($user->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}">Админ-панель</a>
                @endif
            @endauth
        </nav>

    <div class="header-actions">
      <button class="icon-btn" data-cart-open aria-label="Корзина">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M3 4h2l2.4 12.2a2 2 0 0 0 2 1.6h7.6a2 2 0 0 0 2-1.6L21 8H6"/>
          <circle cx="9" cy="21" r="1.4"/><circle cx="18" cy="21" r="1.4"/>
        </svg>
        <span class="cart-badge" id="cart-badge" @if(!$cartCount) style="display:none" @endif>{{ $cartCount }}</span>
      </button>

      @auth
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-ghost btn-sm">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Войти</a>
            @endauth
    </div>
  </div>
</header>
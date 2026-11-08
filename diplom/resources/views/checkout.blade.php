@extends('layouts.app')

@section('title', 'Оформление заказа')

@section('content')

<main class="container cart-page">
  <nav class="breadcrumbs">
    <a href="{{ route('home') }}">Главная</a><span class="sep">/</span>
    <a href="{{ route('cart.index') }}">Корзина</a><span class="sep">/</span>
    <span class="current">Оформление заказа</span>
  </nav>
  <h1>Оформление заказа</h1>

  <div class="checkout-grid">
    <form action="{{ route('checkout.store') }}" method="POST" class="checkout-form">
      @csrf
      <div class="form-group">
        <label for="name">Имя *</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required class="{{ $errors->first('name') ? 'is-invalid' : '' }}">
        @error('name')<span class="form-error">{{ $message }}</span>@enderror
      </div>

      <div class="form-group">
        <label for="phone">Телефон *</label>
        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="+7 (___) ___-__-__" class="{{ $errors->first('phone') ? 'is-invalid' : '' }}">
        @error('phone')<span class="form-error">{{ $message }}</span>@enderror
      </div>

      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" class="{{ $errors->first('email') ? 'is-invalid' : '' }}">
        @error('email')<span class="form-error">{{ $message }}</span>@enderror
      </div>

      <div class="form-group">
        <label for="address">Адрес доставки *</label>
        <input type="text" id="address" name="address" value="{{ old('address') }}" required placeholder="г. Москва, ул. Сладкая, д. 1, кв. 1" class="{{ $errors->first('address') ? 'is-invalid' : '' }}">
        @error('address')<span class="form-error">{{ $message }}</span>@enderror
      </div>

      <div class="form-group">
        <label for="comment">Комментарий к заказу</label>
        <textarea id="comment" name="comment" rows="4" placeholder="Например: желаемая дата и время доставки, пожелания к оформлению">{{ old('comment') }}</textarea>
      </div>

      @if($errors->any())
        <div class="checkout-errors">
          @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      <button type="submit" class="btn btn-primary" style="margin-top:8px">Подтвердить заказ</button>
    </form>

    <aside class="summary-card">
      <h3>Ваш заказ</h3>
      @foreach($cartItems as $item)
        <div class="summary-item">
          <span class="summary-item-name">{{ $item['product']->name }} × {{ $item['quantity'] }}</span>
          <span>{{ number_format($item['product']->price * $item['quantity'], 0, '', ' ') }} ₽</span>
        </div>
      @endforeach
      <div class="summary-row total" style="margin-top:12px"><span>Итого</span><span>{{ number_format($cartTotal, 0, '', ' ') }} ₽</span></div>
      <div class="summary-note">Доставка рассчитывается отдельно и составит от 300 ₽</div>
    </aside>
  </div>
</main>

@endsection
@extends('layouts.app')

@section('title', 'Заказ оформлен)

@section('content')

<main class="container stub-page">
  <div class="ph ph-4" style="width:220px;margin:0 auto 32px">
    <svg viewBox="0 0 64 64" fill="none" stroke="#7A3B44" stroke-width="2.5"><path d="M32 46c-14 0-18-16-4-16 0-10 22-10 22 0 14 0 10 16-4 16Z"/><circle cx="24" cy="20" r="3"/><circle cx="36" cy="16" r="3"/></svg>
  </div>
  <h1>Спасибо за заказ!</h1>
  <p>Ваш заказ №{{ $orderNumber }} принят. Мы свяжемся с вами для подтверждения доставки.</p>
  <a href="{{ route('catalog') }}" class="btn btn-primary">Перейти в каталог</a>
</main>

@endsection
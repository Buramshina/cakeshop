<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Cake Atelier')</title>
<meta name="description" content="@yield('meta_description', 'Cake Atelier — торты и десерты на любой вкус. Натуральные ингредиенты, ручная работа, быстрая доставка.')">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
@include('partials.header')

<main>
  @yield('content')
</main>

@include('partials.footer')
@include('partials.cart-drawer')

<div class="scrim"></div>
<div class="toast"></div>

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/cart.js') }}"></script>
@stack('scripts')
</body>
</html>
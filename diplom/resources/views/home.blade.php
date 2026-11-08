@extends('layouts.app')

@section('title', 'Cake Atelier — торты и десерты на любой вкус')

@section('content')

<!-- HERO -->
<section class="hero">
  <div class="container hero-grid">
    <div>
      <h1>Торты и десерты<br>на любой вкус</h1>
      <p class="lede">Натуральные ингредиенты, нежные вкусы и внимание к каждой детали — выпекаем и украшаем вручную под ваш повод.</p>
      <div class="hero-cta">
        <a href="{{ route('catalog') }}" class="btn btn-primary">Смотреть каталог</a>
        <a href="{{ route('about') }}" class="link-arrow">О нас <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
      </div>
    </div>
    <div class="hero-art">
      <svg viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="200" cy="330" rx="150" ry="18" fill="#E58A9B" opacity=".25"/>
        <rect x="90" y="230" width="220" height="90" rx="18" fill="#FBEAEA"/>
        <rect x="105" y="175" width="190" height="70" rx="16" fill="#FDF6F2"/>
        <rect x="120" y="130" width="160" height="60" rx="14" fill="#FBEAEA"/>
        <path d="M120 130 q10 -22 20 0 q10 -22 20 0 q10 -22 20 0 q10 -22 20 0 q10 -22 20 0 q10 -22 20 0 q10 -22 20 0" fill="none" stroke="#E58A9B" stroke-width="6" stroke-linecap="round"/>
        <circle cx="150" cy="150" r="10" fill="#E27E8D"/>
        <circle cx="200" cy="145" r="12" fill="#F0A6A9"/>
        <circle cx="250" cy="152" r="9" fill="#CE7086"/>
        <path d="M170 230c30-16 60-16 90 0" stroke="#E58A9B" stroke-width="5" fill="none" stroke-linecap="round"/>
        <path d="M150 275c40-18 90-18 130 0" stroke="#E58A9B" stroke-width="5" fill="none" stroke-linecap="round"/>
      </svg>
    </div>
  </div>
</section>

<!-- CATEGORIES -->
<section class="section container">
  <div class="cat-grid">
    @foreach($categories as $cat)
      <article class="cat-card">
        @include('partials.placeholder', ['ph' => $cat->image ?: 'ph-1'])
        <h3>{{ $cat->name }}</h3>
        <a href="{{ route('catalog', ['category' => $cat->slug]) }}" class="link-arrow">Смотреть все <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
      </article>
    @endforeach
  </div>
</section>

<!-- NEWSLETTER -->
<section class="section container">
  <div class="newsletter">
    <div>
      <h2>Узнайте о новинках первыми</h2>
      <p>Подпишитесь на нашу рассылку</p>
      <form class="newsletter-form" action="{{ route('newsletter') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Ваш e-mail" required aria-label="Ваш e-mail">
        <button type="submit" class="btn btn-primary">Подписаться</button>
      </form>
      @if(session('newsletter'))
        <p style="margin-top:12px;color:var(--color-success);font-weight:700">{{ session('newsletter') }}</p>
      @endif
    </div>
    <div class="ph ph-6 newsletter-art">
      <svg viewBox="0 0 64 64" fill="none" stroke="#7A3B44" stroke-width="2.2"><path d="M20 32h24l-3 20a4 4 0 0 1-4 3.6H27a4 4 0 0 1-4-3.6L20 32Z"/><path d="M24 32c-3-8 2-16 8-16s11 8 8 16"/><circle cx="46" cy="20" r="4"/><circle cx="14" cy="24" r="3"/></svg>
    </div>
  </div>
</section>

@endsection
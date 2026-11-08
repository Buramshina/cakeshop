@extends('layouts.app')

@section('title', 'Каталог')

@section('content')

<main class="container">
  <nav class="breadcrumbs">
    <a href="{{ route('home') }}">Главная</a><span class="sep">/</span><span class="current">Каталог</span>
  </nav>
  <h1 class="catalog-title">Каталог</h1>

  <div class="catalog-layout">
    <aside class="filters">
      <form method="GET" action="{{ route('catalog') }}" id="catalog-filters">
        <div class="filter-block">
          <h4>Цена</h4>
          <div class="price-range">
            <input type="number" name="min" value="{{ $filters['min'] ?? '' }}" placeholder="от" aria-label="Цена от">
            <span>—</span>
            <input type="number" name="max" value="{{ $filters['max'] ?? '' }}" placeholder="до" aria-label="Цена до">
          </div>
        </div>
        <div class="filter-block">
          <h4>Поиск</h4>
          <input type="search" name="search" id="search-box" value="{{ $filters['search'] ?? '' }}" placeholder="Название товара…" aria-label="Поиск по каталогу" style="width:100%;padding:10px 14px;border-radius:var(--radius-pill);border:1px solid var(--color-border);font-family:inherit;font-size:13.5px;background:#fff;">
        </div>
        <input type="hidden" name="sort" value="{{ $filters['sort'] ?? 'popular' }}">
        <button type="submit" class="btn btn-ghost btn-block btn-sm" style="margin-top:18px">Применить фильтры</button>
        <a href="{{ route('catalog') }}" class="btn btn-ghost btn-block btn-sm" style="margin-top:8px">Сбросить фильтры</a>
      </form>
    </aside>

    <div>
      <div class="catalog-toolbar">
        <span class="result-count">Найдено: {{ $products->total() }}</span>
        <div class="toolbar-right">
          <select class="sort-select" aria-label="Сортировка" onchange="window.location = this.options[this.selectedIndex].dataset.url">
            <option value="popular" data-url="{{ \App\Support\Url::withParams('popular') }}" @selected(($filters['sort'] ?? 'popular') === 'popular')>По популярности</option>
            <option value="cheap" data-url="{{ \App\Support\Url::withParams('cheap') }}" @selected(($filters['sort'] ?? '') === 'cheap')>Сначала дешевле</option>
            <option value="expensive" data-url="{{ \App\Support\Url::withParams('expensive') }}" @selected(($filters['sort'] ?? '') === 'expensive')>Сначала дороже</option>
            <option value="new" data-url="{{ \App\Support\Url::withParams('new') }}" @selected(($filters['sort'] ?? '') === 'new')>По новизне</option>
          </select>
        </div>
      </div>

      <div class="product-grid">
        @forelse($products as $product)
          @include('partials.product-card', ['product' => $product])
        @empty
          <p style="grid-column:1/-1;text-align:center;padding:60px 0;color:var(--color-text-muted)">По вашему запросу ничего не найдено. Попробуйте изменить фильтры.</p>
        @endforelse
      </div>

      @if($products->hasPages())
        <nav class="pagination" aria-label="Пагинация">
          @if($products->onFirstPage())
            <span class="arrow">‹</span>
          @else
            <a href="{{ $products->previousPageUrl() }}" class="arrow">‹</a>
          @endif

          @foreach($products->links()->elements[0] as $page => $url)
            <a href="{{ $url }}" class="{{ $page === $products->currentPage() ? 'current' : '' }}">{{ $page }}</a>
          @endforeach

          @if($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}" class="arrow">›</a>
          @else
            <span class="arrow">›</span>
          @endif
        </nav>
      @endif
    </div>
  </div>
</main>

@endsection
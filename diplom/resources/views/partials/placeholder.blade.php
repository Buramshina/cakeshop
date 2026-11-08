@php
    $phClass = $ph ?? 'ph-1';
@endphp
@if(! str_starts_with($phClass, 'ph-'))
  <div class="ph ph-img">
    <img src="{{ asset('images/products/' . $phClass) }}" alt="{{ $alt ?? '' }}" loading="lazy">
  </div>
@else
  <div class="ph {{ $phClass }}">
  @if($phClass === 'ph-1')
    <svg viewBox="0 0 64 64" fill="none" stroke="#7A3B44" stroke-width="2.5"><path d="M12 30c0-8 9-12 20-12s20 4 20 12v14a4 4 0 0 1-4 4H16a4 4 0 0 1-4-4V30Z"/></svg>
  @elseif($phClass === 'ph-2')
    <svg viewBox="0 0 64 64" fill="none" stroke="#7A3B44" stroke-width="2.5"><path d="M20 32h24l-3 20a4 4 0 0 1-4 3.6H27a4 4 0 0 1-4-3.6L20 32Z"/><path d="M24 32c-3-8 2-16 8-16s11 8 8 16"/></svg>
  @elseif($phClass === 'ph-3')
    <svg viewBox="0 0 64 64" fill="none" stroke="#7A3B44" stroke-width="2.5"><ellipse cx="32" cy="24" rx="14" ry="10"/><ellipse cx="32" cy="40" rx="14" ry="10"/></svg>
  @elseif($phClass === 'ph-4')
    <svg viewBox="0 0 64 64" fill="none" stroke="#7A3B44" stroke-width="2.5"><path d="M32 46c-14 0-18-16-4-16 0-10 22-10 22 0 14 0 10 16-4 16Z"/><circle cx="24" cy="20" r="3"/><circle cx="36" cy="16" r="3"/></svg>
  @elseif($phClass === 'ph-5')
    <svg viewBox="0 0 64 64" fill="none" stroke="#7A3B44" stroke-width="2.5"><path d="M32 46c-14 0-18-16-4-16 0-10 22-10 22 0 14 0 10 16-4 16Z"/></svg>
  @else
    <svg viewBox="0 0 64 64" fill="none" stroke="#7A3B44" stroke-width="2.5"><ellipse cx="32" cy="30" rx="18" ry="14"/></svg>
  @endif
  </div>
@endif
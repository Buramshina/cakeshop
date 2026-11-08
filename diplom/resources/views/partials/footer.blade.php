<footer class="site-footer">
  <div class="container">
    <div class="footer-grid">
      <div class="footer-about">
        <a href="{{ route('home') }}" class="logo">
          Cake Atelier
        </a>
        <div class="social-row">
          <a href="#" aria-label="Instagram"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/></svg></a>
          <a href="#" aria-label="ВКонтакте"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16v16H4z"/></svg></a>
          <a href="#" aria-label="Telegram"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m22 2-11 20-3-8-8-3Z"/></svg></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Информация</h4>
        <ul>
          <li><a href="{{ route('about') }}">О нас</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Контакты</h4>
        <ul class="footer-contacts">
          <li>+7 (999) 123-45-67</li>
          <li>г. Москва, ул. Сладкая, 1</li>
          <li>Ежедневно 9:00–21:00</li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">© {{ date('Y') }} Cake Atelier. Все права защищены.</div>
  </div>
</footer>
@extends('layouts.app')

@section('title', 'О нас')

@section('content')
  <section class="about-hero">
    <div class="container">
      <nav class="breadcrumbs" aria-label="Хлебные крошки">
            <a href="/index.php">Главная</a>
            <span class="sep">/</span>
            <span class="current">О нас</span>
        </nav>
        <div class="about-hero-grid">
            <div class="about-hero-text">
                <p class="about-eyebrow">О платформе</p>
                <h1>Место, где кондитеры находят своих клиентов</h1>
                <p class="about-lede">
                    Мы создали пространство, в котором домашние кондитеры, самозанятые и индивидуальные предприниматели
                    могут показать свои торты широкой аудитории — без сложной регистрации, без склада и без лишних
                    посредников. А клиенты — найти торт, который хочется фотографировать.
                </p>
            </div>
            <div class="about-hero-art ph ph-1" aria-hidden="true">
                <!-- сюда можно вставить фото или SVG -->
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <h2>Почему кондитеры выбирают нас</h2>
        </div>

        <div class="about-advantages">
            <article class="about-advantage">
                <div class="icon-wrap" aria-hidden="true">
                    <!-- иконка: витрина / магазин -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l1.5-4h15L21 9"/>
                        <path d="M3 9h18v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9z"/>
                        <path d="M9 13h6"/>
                    </svg>
                </div>
                <h3>Своя витрина за 15 минут</h3>
                <p>
                    Загрузите фотографии тортов, укажите состав, вес и цену — и ваша витрина готова.
                    Не нужен ни сайт, ни программист, ни отдельная касса.
                </p>
            </article>

            <article class="about-advantage">
                <div class="icon-wrap" aria-hidden="true">
                    <!-- иконка: аудитория / люди -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="8" r="3.5"/>
                        <path d="M2.5 20c.8-3.4 3.4-5.5 6.5-5.5s5.7 2.1 6.5 5.5"/>
                        <circle cx="17.5" cy="9" r="2.5"/>
                        <path d="M15 20c.4-2.4 1.8-4 3.8-4 1.4 0 2.7.9 3.3 2.4"/>
                    </svg>
                </div>
                <h3>Живая аудитория</h3>
                <p>
                    На площадку приходят люди, которые уже ищут торт на праздник.
                    Вам не нужно тратить бюджет на рекламу и «выбивать» первые заказы в соцсетях.
                </p>
            </article>

            <article class="about-advantage">
                <div class="icon-wrap" aria-hidden="true">
                    <!-- иконка: документ / законно -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 3h9l4 4v14a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"/>
                        <path d="M14 3v5h5"/>
                        <path d="M8.5 13.5l2 2 4-4.5"/>
                    </svg>
                </div>
                <h3>Для самозанятых и ИП</h3>
                <p>
                    Платформа подходит и самозанятым, и индивидуальным предпринимателям.
                    Мы не просим отчитываться за каждую крошку — только соблюдать закон о вашей форме
                    деятельности и выдавать чек через «Мой налог» или онлайн-кассу.
                </p>
            </article>

            <article class="about-advantage">
                <div class="icon-wrap" aria-hidden="true">
                    <!-- иконка: сердце / качество -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 20s-7-4.4-7-10a4 4 0 0 1 7-2.6A4 4 0 0 1 19 10c0 5.6-7 10-7 10z"/>
                    </svg>
                </div>
                <h3>Фокус на эстетике</h3>
                <p>
                    Мы делаем ставку на визуал: у каждого торта — красивая карточка с крупным фото,
                    описанием вкуса и составом. Такие карточки не стыдно показывать и пересылать друзьям.
                </p>
            </article>

            <article class="about-advantage">
                <div class="icon-wrap" aria-hidden="true">
                    <!-- иконка: чат / заявки -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 5h16a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H9l-4 4v-4H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1z"/>
                        <path d="M8 10h8M8 13h5"/>
                    </svg>
                </div>
                <h3>Заявки без переписок</h3>
                <p>
                    Клиент оставляет заявку прямо на странице торта: дата, вес, пожелания.
                    Вы получаете её в удобном виде — по почте или в Telegram — и отвечаете, когда вам удобно.
                </p>
            </article>

            <article class="about-advantage">
                <div class="icon-wrap" aria-hidden="true">
                    <!-- иконка: рост / стрелка вверх -->
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 17l6-6 4 4 7-8"/>
                        <path d="M14 7h6v6"/>
                    </svg>
                </div>
                <h3>Прозрачные условия</h3>
                <p>
                    Никаких скрытых комиссий и «дополнительных пакетов». Вы видите,
                    сколько стоит размещение, и сами решаете, когда его продлить.
                </p>
            </article>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="about-audience">
            <div class="about-audience-text">
                <p class="about-eyebrow">Кому подходит</p>
                <h2>Если вы печёте дома — вам сюда</h2>
                <p class="about-lede">
                    Платформа создана для кондитеров, которые работают на себя:
                    самозанятых, ИП и мастеров, которые только планируют легализоваться.
                    Мы не агентство и не маркетплейс с миллионом продавцов — у нас небольшая,
                    но живая витрина, где каждый торт видно.
                </p>

                <ul class="about-checklist">
                    <li>Индивидуальные предприниматели с онлайн-кассой</li>
                    <li>Кондитеры, которые хотят выйти за пределы «сарафана»</li>
                    <li>Мастера, которым важно, как их торт выглядит на фото</li>
                </ul>

                <div class="about-cta">
                    <a href="/contacts.php" class="btn btn-primary">Разместить торт</a>
                    <a href="/catalog.php" class="link-arrow">
                        Смотреть каталог
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14M13 6l6 6-6 6"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="about-audience-art ph ph-3" aria-hidden="true"></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="about-note">
            <h2>Что важно знать</h2>
            <p>
                Мы — площадка, которая помогает кондитерам и клиентам найти друг друга.
                Все заказы, оплата и доставка обсуждаются напрямую между вами и клиентом.
                Мы не берём на себя роль магазина и не отвечаем за качество конкретного изделия —
                за это отвечает кондитер.
            </p>
            <p>
                Если вы самозанятый — не забудьте пробить чек в приложении «Мой налог».
                Если вы ИП — используйте свою онлайн-кассу. Так и вам спокойнее, и клиенту понятнее.
            </p>
        </div>
    </div>
</section>
@endsection
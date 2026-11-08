@extends('layouts.app')

@section('title', 'Регистрация')

@section('content')
<section class="section auth-section">
    <div class="container auth-container">
        <h1>Регистрация</h1>

        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="auth-form">
            @csrf
            
            <label class="form-group">
                <span class="form-label">Имя</span>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus>
            </label>
            
            <label class="form-group">
                <span class="form-label">Email</span>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </label>
            
            <label class="form-group">
                <span class="form-label">Телефон</span>
                <input type="tel" name="phone" value="{{ old('phone') }}">
            </label>
            
            <label class="form-group">
                <span class="form-label">Пароль</span>
                <input type="password" name="password" required minlength="8">
            </label>

            <label class="form-group">
                <span class="form-label">Повторите пароль</span>
                <input type="password" name="password_confirmation" required>
            </label>
            
            <button class="btn btn-primary btn-block" type="submit">Зарегистрироваться</button>
        </form>
        
        <p class="auth-switch">Уже есть аккаунт? <a href="{{ route('login') }}" class="link-arrow">Войти</a></p>
    </div>
</section>
@endsection
@extends('layouts.app')

@section('title', 'Вход')

@section('content')
<section class="section auth-section">
    <div class="container auth-container">
        <h1>Вход</h1>

        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf
            
            <label class="form-group">
                <span class="form-label">Email</span>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            </label>
            
            <label class="form-group">
                <span class="form-label">Пароль</span>
                <input type="password" name="password" required>
            </label>

            <label class="form-check">
                <input type="checkbox" name="remember" value="1">
                <span>Запомнить меня</span>
            </label>
            
            <button class="btn btn-primary btn-block" type="submit">Войти</button>
        </form>
        
        <p class="auth-switch">Нет аккаунта? <a href="{{ route('register') }}" class="link-arrow">Зарегистрироваться</a></p>
    </div>
</section>
@endsection
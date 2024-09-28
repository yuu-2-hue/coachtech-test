@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/register.css">
@endsection

@section('header-button')
<!-- ログアウトボタン -->
<form class="header-form" action="/login" method="get">
@csrf
    <button class="form__login--button">login</button>
</form>
@endsection

@section('content')
<div class="register__content">
    <p class="register__heading">Register</p>

    <div class="register__content--frame">
        <form class="register__form" action="/register" method="post">
            @csrf
            <div class="register__group--content">
                <div class="register__group">
                    <p class="register__title--item">お名前</p>
                    <input class="register__input--item" type="text" name="name" value="{{ old('name') }}" placeholder="例：山田太郎" />
                </div>
                <div class="name__error">@error('name') {{ $message }} @enderror</div>
                <div class="register__group">
                    <p class="register__title--item">メールアドレス</p>
                    <input class="register__input--item" type="email" name="email" value="{{ old('email') }}" placeholder="例:test@example.com" />
                </div>
                <div class="email__error">@error('email') {{ $message }} @enderror</div>
                <div class="register__group">
                    <p class="register__title--item">パスワード</p>
                    <input class="register__input--item" type="password" name="password" placeholder="例:coachtech1106" />
                </div>
                <div class="password__error">@error('password') {{ $message }} @enderror</div>
                <div class="register__group">
                    <p class="register__title--item">パスワード確認</p>
                    <input class="register__input--item" type="password_confirmation" name="password_confirmation" />
                </div>
                <div class="password-confirmation__error"></div>
            </div>

            <button class="form__button" type="submit">登録</button>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/login.css">
@endsection

@section('header-button')
<!-- 登録ボタン -->
<form class="header-form" action="/register" method="get">
    <button class="form__register--button">register</button>
</form>
@endsection

@section('content')
<div class="login__content">
    <p class="login__heading">login</p>

    <div class="login__content--frame">
        <form class="login__form" action="/login" method="post">
        @csrf
            <div class="login__group--content">
                <div class="login__group">
                    <p class="login__title--item">メールアドレス</p>
                    <input class="login__input--item" type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com">
                </div>
                <div class="email__error">@error('email') {{ $message }} @enderror</div>
                <div class="login__group">
                    <p class="login__title--item">パスワード</p>
                    <input class="login__input--item" type="password" name="password" placeholder="例：coachtech1106">
                </div>
                <div class="password__error">@error('password') {{ $message }} @enderror</div>
            </div>
            <button class="form__button" type="submit">ログイン</button>
        </form>
    </div>
</div>
@endsection
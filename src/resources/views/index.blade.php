@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/index.css">
@endsection

@section('content')
<div class="contact-form__content">
    <p class="contact-form__heading">Contact</p>

    <!-- 入力ページの各項目 -->
    <form class="form" action="/confirm" method="post">
    @csrf
        <!-- 名前の入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__input--text" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="  例：山田" />
                <input class="form__input--text" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="  例：太郎" />
            </div>
        </div>
        <div class="form__error">
            <div class="name__error">@error('first_name') {{ $message }} @enderror</div>
            <div class="name__error">@error('last_name') {{ $message }} @enderror</div>
        </div>
        <!-- 性別の入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__input--radio" type="radio" name="gender" value="1" @if(old('gender')=='1') checked @endif checked id="man">
                    <label class="form__label--radio" for="man">男性</label>
                <input class="form__input--radio" type="radio" name="gender" value="2" @if(old('gender')=='2') checked @endif id="woman">
                    <label class="form__label--radio" for="woman">女性</label>
                <input class="form__input--radio" type="radio" name="gender" value="3" @if(old('gender')=='3') checked @endif id="another">
                    <label class="form__label--radio" for="another">その他</label>
            </div>
        </div>
        <div class="form__error">
            <div class="gender__error">@error('gender') {{ $message }} @enderror</div>
        </div>
        <!-- メールアドレスの入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__input--email" type="email" name="email" value="{{ old('email') }}" placeholder="  例：test@example.com" />
            </div>
        </div>
        <div class="form__error">
            <div class="email__error">@error('email') {{ $message }} @enderror</div>
        </div>
        <!-- 電話番号の入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__input--tel" type="tel" name="tel_first" value="{{ old('tel_first') }}" placeholder="  例：080" />
                    <label class="form__label--hyphen" for="">-</label>
                <input class="form__input--tel" type="tel" name="tel_second" value="{{ old('tel_second') }}" placeholder="  例：1234" />
                    <label class="form__label--hyphen" for="">-</label>
                <input class="form__input--tel" type="tel" name="tel_third" value="{{ old('tel_third') }}" placeholder="  例：5678" />
            </div>
        </div>
        <div class="form__error">
            <div class="tel__error">@error('tel_first') {{ $message }} @enderror</div>
            <div class="tel__error">@error('tel_second') {{ $message }} @enderror</div>
            <div class="tel__error">@error('tel_third') {{ $message }} @enderror</div>
        </div>
        <!-- 住所の入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <input class="form__input--address" type="text" name="address" value="{{ old('address') }}" placeholder="  例: 東京都渋谷区千駄ヶ谷1-2-3" />
            </div>
        </div>
        <div class="form__error">
            <div class="address__error">@error('address') {{ $message }} @enderror</div>
        </div>
        <!-- 建物名の入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <input class="form__input--building" type="text" name="building"  value="{{ old('building') }}" placeholder="  例: 千駄ヶ谷マンション101" />
            </div>
        </div>
        <!-- お問い合わせ種類の入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <select class="form__select" id="content" name="content">
                    <option class="form__select--option" value="" hidden>選択してください</option>
                    @foreach($categories as $category)
                    <option class="form__select--option" value="{{ $category->id }}" @if(old('content') == $category->id) selected @endif>{{ $category->content }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form__error">
            <div class="content__error">@error('content') {{ $message }} @enderror</div>
        </div>
        <!-- お問い合わせ内容の入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <textarea class="form__input--textarea" name="detail" value="detail" placeholder="お問い合わせ内容をご記入ください">{{old('detail')}}</textarea>
            </div>
        </div>
        <div class="form__error">
            <div class="detail__error">@error('detail') {{ $message }} @enderror</div>
        </div>
        <!-- 確認画面にデータを送る -->
        <button class="form__button" type="submit">確認画面</button>

    </form>
</div>
@endsection

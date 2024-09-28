@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/admin.css">
@endsection

@section('header-button')
<!-- ログアウトボタン -->
@if(Auth::check())
<form class="header-form" action="/logout" method="post">
@csrf
    <button class="form__logout--button">logout</button>
</form>
@endif
@endsection

@section('content')
<div class="admin__content">
    <p class="admin__heading">Admin</p>

    <div class="admin__search">
        <form class="search__form" action="/admin" method="get">
        @csrf
            <!-- 文字での検索 -->
            <div class="form__group-content">
                <input class="form__input--text" type="text" name="data" value="{{old('data')}}" placeholder="名前やメールアドレスを入力してください" />
            </div>
            <!-- 性別での検索 -->
            <div class="form__group-content">
                <select class="form__select--gender" name="gender" value="{{old('gender')}}">
                    <option class="form__select--option" value="" hidden>性別</option>
                    <option class="form__select--option" value="">全て</option>
                    <option class="form__select--option" value="1">男性</option>
                    <option class="form__select--option" value="2">女性</option>
                    <option class="form__select--option" value="3">その他</option>
                </select>
            </div>
            <!-- お問い合わせの種類での検索 -->
            <div class="form__group-content">
                <select class="form__select--type" id="category_id" name="category_id">
                    <option class="form__select--option" value="" hidden>お問い合わせの種類</option>
                    @foreach($categories as $category)
                    <option class="form__select--option" value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->content }}</option>
                    @endforeach
                </select>
            </div>
            <!-- 日付での検索 -->
            <div class="form__group-content">
                <input class="form__date" type="date" name="created_at" value="{{old('created_at')}}" placeholder="年/月/日">
            </div>
            <!-- 検索 -->
            <div class="form__group-content">
                <input class="form__search" type="submit" name="search" value="検索">
            </div>
            <!-- 検索項目をリセットする -->
            <div class="form__group-content">
                <input class="form__reset" type="submit" name="reset" value="リセット">
            </div>
        </form>
    </div>

    <!-- エクスポートとページネーション -->
    <div class="admin__buttons">
        <div class="admin__export--button">
            <button>エクスポート</button>
        </div>
        <div class="admin__pagination--button">
            {{ $contacts->appends(request()->query())->links('vendor.pagination.tailwind-admin') }}
        </div>
    </div>

    <!-- お問い合わせ一覧 -->
    <div class="admin__content-list">
        <table class="content-list__table">
            <tr class="content-list__table-colum">
                <th class="table__colum--item">お名前</th>
                <th class="table__colum--item">性別</th>
                <th class="table__colum--item">メールアドレス</th>
                <th class="table__colum--item">お問い合わせの種類</th>
                <th class="table__colum--item"></th>
            </tr>
            @foreach($contacts as $contact)
            <tr class="content-list__table-row">
                @csrf
                <td class="table__data--item">{{$contact['first_name']}}{{$contact['last_name']}}</td>
                <td class="table__data--item">
                    @if($contact['gender'] == 1)男性@endif
                    @if($contact['gender'] == 2)女性@endif
                    @if($contact['gender'] == 3)その他@endif
                </td>
                <td class="table__data--item">{{$contact['email']}}</td>
                <td class="table__data--item">
                    @foreach($categories as $category)
                        @if($category['id'] == $contact['category_id'])
                            {{$category['content']}}
                        @endif
                    @endforeach
                </td>
                <td class="table__data--item">
                    <livewire:modal :contact="$contact" />
                </td>
            </tr>
            @endforeach
        </table>
        @livewireScripts
    </div>

</div>
@endsection
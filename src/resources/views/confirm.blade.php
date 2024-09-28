@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="css/confirm.css">
@endsection

@section('content')
<div class="confirm__content">
    <p class="confirm__heading">Confirm</p>
    <div class="confirm">
        <!-- 入力ページから受け取ったデータのテーブル -->
        <form class="form" action="/" method="post">
        @csrf
            <table class="confirm__table">
                <tr>
                    <td class="confirm__table--title">お名前</td>
                    <td class="confirm__table--content">
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" readonly/>{{ $contact['first_name'] }}
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly/>{{ $contact['last_name'] }}
                    </td>
                </tr>
                <tr>
                    <td class="confirm__table--title">性別</td>
                    <td class="confirm__table--content">
                        <input type="hidden" name="gender" value="{{$contact['gender']}}" readonly/>
                        @if($contact['gender'] == 1)
                        男性
                        @endif
                        @if($contact['gender'] == 2)
                        女性
                        @endif
                        @if($contact['gender'] == 3)
                        その他
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="confirm__table--title">メールアドレス</td>
                    <td class="confirm__table--content">
                        <input type="hidden" name="email" value="{{ $contact['email'] }}" readonly/>
                        {{ $contact['email'] }}
                    </td>
                </tr>
                <tr>
                    <td class="confirm__table--title">電話番号</td>
                    <td class="confirm__table--content">
                        <!-- データベースに登録する用のinput -->
                        <input type="hidden" name="tell" value="{{ $contact['tel_first'] }}{{ $contact['tel_second'] }}{{ $contact['tel_third'] }}" readonly/>{{ $contact['tel_first'] }}{{ $contact['tel_second'] }}{{ $contact['tel_third'] }}

                        <!-- お問い合わせ画面に戻すようのinput -->
                        <input type="hidden" name="tel_first" value="{{ $contact['tel_first'] }}">
                        <input type="hidden" name="tel_second" value="{{ $contact['tel_second'] }}">
                        <input type="hidden" name="tel_third" value="{{ $contact['tel_third'] }}">
                    </td>
                </tr>
                <tr>
                    <td class="confirm__table--title">住所</td>
                    <td class="confirm__table--content">
                        <input type="hidden" name="address" value="{{ $contact['address'] }}" readonly/>
                        {{ $contact['address'] }}
                    </td>
                </tr>
                <tr>
                    <td class="confirm__table--title">建物名</td>
                    <td class="confirm__table--content">
                        <input type="hidden" name="building" value="{{ $contact['building'] }}" readonly/>
                        {{ $contact['building'] }}
                    </td>
                </tr>
                <tr>
                    <td class="confirm__table--title">お問い合わせの種類</td>
                    <td class="confirm__table--content">
                        <input type="hidden" name="content" value="{{ $contact['content'] }}" readonly/>
                        @if($contact['content'] == 1)
                        商品のお届けについて
                        @endif
                        @if($contact['content'] == 2)
                        商品の交換について
                        @endif
                        @if($contact['content'] == 3)
                        商品トラブル
                        @endif
                        @if($contact['content'] == 4)
                        ショップへのお問い合わせ
                        @endif
                        @if($contact['content'] == 5)
                        その他
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="confirm__table--title">お問い合わせ内容</td>
                    <td class="confirm__table--content">
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" readonly/>
                        {{ $contact['detail'] }}
                    </td>
                </tr>
            </table>

            <div class="confirm__button">
                <button class="confirm__button--submit" name="send" type="submit" value="send">送信</button>
                <button class="confirm__button--link" name="back" type="submit" value="back">修正</button>
            </div>
        </form>
    </div>

</div>
@endsection

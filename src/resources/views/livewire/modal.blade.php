<div>
    <button class="form__button" type="submit" wire:click="openModal()">詳細</button>
    @if($showModal)
        <div class="modal-window">
            <button class="modal__close-button" type="button" wire:click="closeModal()">×</button>
            <div class="">
                <table class="modal-table">
                    <tr>
                        <th class="modal-table__ttl">お名前</th>
                        <td class="modal-table__data">
                            <input type="text" value="{{ $contact->first_name }}{{ $contact->last_name }}" hidden readonly />
                            {{ $contact->first_name }}{{ $contact->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th class="modal-table__ttl">性別</th>
                        <td class="modal-table__data">
                            <input type="text" value="{{ $contact->gender }}" hidden readonly />
                                @if($contact->gender == 1)男性@endif
                                @if($contact->gender == 2)女性@endif
                                @if($contact->gender == 3)その他@endif
                        </td>
                    </tr>
                    <tr>
                        <th class="modal-table__ttl">メールアドレス</th>
                        <td class="modal-table__data">
                            <input type="email" value="{{ $contact->email }}" hidden readonly />
                                {{ $contact->email }}
                        </td>
                    </tr>
                    <tr>
                        <th class="modal-table__ttl">電話番号</th>
                        <td class="modal-table__data">
                            <input type="text" value="{{ $contact->tell }}" hidden readonly />
                                {{ $contact->tell }}
                        </td>
                    </tr>
                    <tr>
                        <th class="modal-table__ttl">住所</th>
                        <td class="modal-table__data">
                            <input type="text" value="{{ $contact->address }}" hidden readonly />
                                {{ $contact->address }}
                        </td>
                    </tr>
                    <tr>
                        <th class="modal-table__ttl">建物名</th>
                        <td class="modal-table__data">
                            <input type="text" value="{{ $contact->building }}" hidden readonly />
                                {{ $contact->building }}
                        </td>
                    </tr>
                    <tr>
                        <th class="modal-table__ttl">お問い合わせの種類</th>
                        <td class="modal-table__data">
                            <input type="text" value="{{ $contact->category_id }}" hidden readonly />
                                @foreach($categories as $category)
                                    @if($category->id == $contact->category_id)
                                        {{ $category->content }}
                                    @endif
                                @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th class="modal-table__ttl">お問い合わせ内容</th>
                        <td class="modal-table__data">
                            <input type="text" value="{{ $contact->detail }}" hidden readonly />
                                {{ $contact->detail }}
                        </td>
                    </tr>
                </table>
                <form action="/admin" method="post">
                @method('DELETE')
                @csrf
                    <input type="hidden" name="id" value="{{ $contact->id }}">
                    <button class="delete-button" type=submit>削除</button>
                </form>
            </div>
        </div>
    @endif
</div>



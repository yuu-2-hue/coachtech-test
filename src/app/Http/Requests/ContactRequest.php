<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'email' => ['required', 'email'],
            'tel_first' => ['required', 'digits_between: 1, 5'],
            'tel_second' => ['required', 'digits_between: 1, 5'],
            'tel_third' => ['required', 'digits_between: 1, 5'],
            'address' => ['required', 'string'],
            'content' => ['required', 'string'],
            'detail' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return[
            'first_name.required' => '姓を入力してください',
            'last_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tel_first.required' => '電話番号を入力してください',
            'tel_second.required' => '電話番号を入力してください',
            'tel_third.required' => '電話番号を入力してください',
            'tel_first.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel_second.digits_between' => '電話番号は5桁までの数字で入力してください',
            'tel_third.digits_between' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'content.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問合せ内容を入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください',
        ];
    }
}

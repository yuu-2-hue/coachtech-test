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
            'tel_first' => ['required_without:tel_second, tel_third', 'max:5', 'integer'],
            'tel_second' => ['required_without:tel_first, tel_third', 'max:5', 'integer'],
            'tel_third' => ['required_without:tel_first, tel_second', 'max:5', 'integer'],
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
            'required_without' => '電話番号を入力してください',
            'integer' => '電話番号は5桁までの数字で入力してください',
            'tel_first.max' => '電話番号は5桁までの数字で入力してください',
            'tel_second.max' => '電話番号は5桁までの数字で入力してください',
            'tel_third.max' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'content.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問合せ内容を入力してください',
            'detail.max' => 'お問合せ内容は120文字以内で入力してください',
        ];
    }
}

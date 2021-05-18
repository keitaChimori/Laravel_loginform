<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'last_name' => ['bail', 'required', 'max:50'],
            'first_name' => ['bail', 'required', 'max:50'],
            'last_kana' => ['bail', 'required', 'max:50'],
            'first_kana' => ['bail', 'required', 'max:50'],
            'email' => ['bail', 'required', 'email', 'unique:users', 'max:255'],
            'tel' => ['bail', 'required', 'regex:/^0\d{9,10}$/', 'unique:users', 'max:13'],
            'password' => ['bail', 'required', 'min:4', 'max:255', 'regex:/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{4,255}+\z/i' ,'confirmed'],
            'password_confirmation' => ['required'],
            'birthyear' => ['required'],
            'birthmonth' => ['required'],
            'birthday' => ['required'],
            'post' => ['bail', 'required', 'regex:/^[0-9]{7}$/'],
            'prefecture' => ['required'],
            'address1' => ['bail', 'required', 'max:255'],
            'address2' => ['bail', 'max:255'],
            'gender' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => ':attributeは必須です',
            'last_name.max' => ':attributeは50文字以下で入力してください',
            'first_name.required' => ':attributeは必須です',
            'first_name.max' => ':attributeは50文字以下で入力してください',
            'last_kana.required' => ':attributeは必須です',
            'last_kana.max' => ':attributeは50文字以下で入力してください',
            'first_kana.required' => ':attributeは必須です',
            'first_kana.max' => ':attributeは50文字以下で入力してください',
            'first_kana.max' => ':attributeは50文字以下で入力してください',
            'email.required' => ':attributeは必須です',
            'email.email' => ':attributeは正しい形式で入力してください',
            'email.required' => ':attributeは必須です',
            'email.unique' => ':attributeはすでに登録済です',
            'email.max' => ':attributeは255文字以下で入力してください',
            'tel.required' => ':attributeは必須です',
            'tel.max' => ':attributeは必須です',
            'tel.regex' => ':attributeは正しい形式で入力してください',
            'tel.unique' => ':attributeはすでに登録済です',
            'tel.max' => ':attributeは13文字以下で入力してください',
            'password.required' => ':attributeは必須です',
            'password.min' => ':attributeは4文字以上で入力してください',
            'password.max' => ':attributeは255文字以下で入力してください',
            'password.regex' => ':attributeは正しい形式で入力してください',
            'password_confirmation.required' => ':attributeは必須です',
            'password.confirmed' => ':attributeとパスワード【確認用】が一致しません',
            'birthyear.required' => ':attributeは必須です',
            'birthmonth.required' => ':attributeは必須です',
            'birthday.required' => ':attributeは必須です',
            'post.required' => ':attributeは必須です',
            'prefecture.required' => ':attributeは必須です',
            'address1.required' => ':attributeは必須です',
            'address1.max' => ':attributeは255文字以下で入力してください',
            'address2.max' => ':attributeは255文字以下で入力してください',
            'gender.required' => ':attributeは必須です',
        ];
    }

    public function attributes()
    {
        return [
            'last_name' => 'お名前',
            'first_name' => 'お名前',
            'last_kana' => 'セイ',
            'first_kana' => 'メイ',
            'email' => 'メールアドレス',
            'tel' => '電話番号',
            'password' => 'パスワード',
            'password_confirmation' => 'パスワード【確認用】',
            'birthyear' => '年',
            'birthmonth' => '月',
            'birthday' => '日',
            'post' => '郵便番号',
            'prefecture' => '都道府県',
            'address1' => '市区町村・丁目・番地',
            'address2' => '建物名',
            'gender' => '性別',
        ];
    }
}

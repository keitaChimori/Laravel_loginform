<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'email' => ['bail', 'required', 'email', 'max:255'],
            'password' => ['bail', 'required', 'max:255', 'min:4', 'regex:/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{4,255}+\z/i' ],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => ':attributeは必須です',
            'email.max' => ':attributeは255文字以下で入力してください',
            'password.required' => ':attributeは必須です',
            'password.max' => ':attributeは255文字以下で入力してください',
            'password.min' => ':attributeは4文字以上で入力してください',
            'password.regex' => ':attributeは半角数字・英字をそれぞれ1文字以上含む形式で入力してください',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'メールアドレス',
            'password' => 'パスワード',
        ];
    }
}

<?php

namespace LaravelSample\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name' => ['required', 'min:3', 'max:64', 'unique:users'],
            'email' => ['required', 'min:4', 'max:255', 'unique:users'],
            'password' => ['required', 'min:4', 'max:16'],
        ];
    }

    public function messages(){
        return [
            'name.required'  => '名前を入力してください。',
            'name.min'       => '名前は3文字以上で入力してください',
            'name.max'       => '名前が長すぎます',
            'name.unique'       => '名前は既に登録されています',
            'email.required'=> 'Emailを入力してください。',
            'email.min'     => 'Emailが短かすぎます',
            'email.max'     => 'Emailが長すぎます',
            'email.unique'       => 'Emailは既に登録されています',
            'password.required'=> 'パスワード入力してください。',
            'password.min'     => 'パスワードは4文字以上で入力してください',
            'password.max'     => 'パスワードは16文字以内で入力してください',
        ];
    }
}

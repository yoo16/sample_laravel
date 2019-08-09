<?php

namespace LaravelSample\Http\Requests;

use LaravelSample\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => [
                'required', 'min:3', 'max:64',
                Rule::unique('users')->ignore($this->id),
            ],
            'email' => [
                'required', 'min:4', 'max:255',
                Rule::unique('users')->ignore($this->id),
            ]
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
        ];
    }

}

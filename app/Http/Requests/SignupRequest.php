<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class SignupRequest extends FormRequest
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
            //
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'min:8|max:20'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必須',
            'email.required' => 'emailは必須です',
            'email.unique' => '登録済みです',
            'password.min' => '8より多く',
            'password.max' => '20',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $res = response()->json([
            'errors' => $validator->errors(),
        ], 400);
        throw new HttpResponseException($res);
    }
}

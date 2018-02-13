<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UserPutRequest extends FormRequest
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
            'pseudo' => 'min:4|max:255',
            'first_name' => 'min:2|max:255',
            'last_name' => 'min:2|max:255',
            'email' => 'unique:users|email|min:5|max:255',
            'password' => 'min:6|max:255'
        ];
    }

    public function wantsJson()
    {
        return true;
    }

}

<?php

namespace App\Http\Requests\Prefs;

use Illuminate\Foundation\Http\FormRequest;

class PrefPutRequest extends FormRequest
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
            'rating' => 'numeric|min:0|max:5'
        ];
    }

    public function wantsJson()
    {
        return true;
    }

}

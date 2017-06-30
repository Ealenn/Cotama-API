<?php

namespace App\Http\Requests\Users;

use App\Models\Foyers\Foyer;
use Illuminate\Foundation\Http\FormRequest;

class UserGetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Foyer::isFriend($this->user(), $this->user) || $this->user->id == $this->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

        ];
    }

    public function wantsJson()
    {
        return true;
    }
}

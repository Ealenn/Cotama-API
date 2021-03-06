<?php

namespace App\Http\Requests\Foyers;

use App\Facades\FoyerFacade;
use Illuminate\Foundation\Http\FormRequest;

class FoyerPutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();
        return FoyerFacade::isAdmin($user, $this->route('foyer'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'min:4|max:255'
        ];
    }

    public function wantsJson()
    {
        return true;
    }

}

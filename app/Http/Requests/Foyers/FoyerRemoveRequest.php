<?php

namespace App\Http\Requests\Foyers;

use App\Facades\FoyerFacade;
use Illuminate\Foundation\Http\FormRequest;

class FoyerRemoveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return FoyerFacade::isAdmin(
              $this->user(),
              $this->route('foyer')
            )
        ;
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

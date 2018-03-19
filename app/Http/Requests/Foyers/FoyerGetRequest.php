<?php

namespace App\Http\Requests\Foyers;

use App\Facades\FoyerFacade;
use App\Models\Foyers\Foyer;
use Illuminate\Foundation\Http\FormRequest;

class FoyerGetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return FoyerFacade::isInFoyer(
          $this->user(),
          Foyer::find($this->route('foyer'))->first()
        );
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

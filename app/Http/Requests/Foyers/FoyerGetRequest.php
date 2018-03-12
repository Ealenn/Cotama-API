<?php

namespace App\Http\Requests\Foyers;

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
        $user = $this->user();
        $foyer = Foyer::find($this->route('foyer'))->first();
        return FoyerService::isAdminFoyer($user, $foyer);
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

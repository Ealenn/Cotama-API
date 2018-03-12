<?php

namespace App\Http\Requests\Foyers;

use App\Models\Foyers\Foyer;
use Illuminate\Foundation\Http\FormRequest;

class FoyerDeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return FoyerService::isInFoyer($this->input('userId'), $this->input('foyerId'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'foyerId' => 'numeric',
            'userId' => 'numeric'
        ];
    }

    public function wantsJson()
    {
        return true;
    }
}

<?php

namespace App\Http\Requests\Foyers;

use App\Models\Foyers\Foyer;
use Illuminate\Foundation\Http\FormRequest;

class FoyerJoinRequest extends FormRequest
{
    public $Foyer = null;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->request->has('key')){
            $key = $this->request->get('key');
            $this->Foyer = Foyer::where('key', $key)->first();
            return !is_null($this->Foyer);
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'key' => 'required'
        ];
    }

    public function wantsJson()
    {
        return true;
    }

}

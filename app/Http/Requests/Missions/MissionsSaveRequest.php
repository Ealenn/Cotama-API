<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 07/06/2018
 * Time: 21:57
 */

namespace App\Http\Requests\Missions;


use Illuminate\Foundation\Http\FormRequest;

class MissionsSaveRequest extends FormRequest
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
            'title' => 'required|min:4|max:255',
            'date_start' => 'required|date',
            'housework_ids' => 'required|array',
            'foyer_id' => 'required|integer'
        ];
    }

    public function wantsJson()
    {
        return true;
    }
}
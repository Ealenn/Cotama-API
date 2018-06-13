<?php

namespace App\Http\Requests\Missions;

use App\Facades\FoyerFacade;
use App\Facades\MissionFacade;
use App\Models\Mission\Mission;
use Illuminate\Foundation\Http\FormRequest;

class MissionsDeleteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $mission = Mission::find($this->route('mission'))->first();
        return MissionFacade::canDelete($this->user(), $mission) || FoyerFacade::isAdmin($this->user(), $mission->foyer);
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

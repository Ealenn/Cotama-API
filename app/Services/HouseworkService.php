<?php

namespace App\Services;


use App\Models\Mission\Mission;
use App\Models\State\State;

class HouseworkService {

    /**
     * Met à jour l'état d'une tâche.
     * @param array $params
     */
    public function updateState(array $params) {
        Mission::where('id', $params['mission_id'])->first()
            ->houseworks()->updateExistingPivot($params['housework_id'], ['state_id' => State::where('code', $params['state'])->first()->id]);
    }
}
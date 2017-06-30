<?php

namespace App\Http\Controllers\Foyers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Foyers\FoyerJoinRequest;
use App\Models\Foyers\Foyer;

/**
 * Class FoyerUserAPIController
 * @resource UserInFoyers
 * @package App\Http\Controllers\Foyers
 */
class FoyerUserAPIController extends Controller
{

    /**
     * Rejoindre un foyer | Joining a Home
     *
     * ### Erreurs possible
     * - 404 : Clef invalide | Invalid key
     *
     * @param \App\Http\Requests\Foyers\FoyerJoinRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoyerJoinRequest $request)
    {
        Foyer::addUserFoyer(
            $request->user(),
            $request->Foyer
        );

        return response()->json($request->Foyer);
    }
}

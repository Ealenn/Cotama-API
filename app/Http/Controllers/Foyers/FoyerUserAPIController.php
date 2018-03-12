<?php

namespace App\Http\Controllers\Foyers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Foyers\FoyerDeleteRequest;
use App\Http\Requests\Foyers\FoyerJoinRequest;

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
       FoyerService::addUserToFoyer(
            $request->user(),
            $request->Foyer,
            false
        );

        return response()->json($request->Foyer);
    }

    public function delete(FoyerDeleteRequest $request, $foyerId, $userId)
    {
        FoyerService::delete($foyerId, $userId);

        return response()->json(['isDeleted'=>true]);
    }
}

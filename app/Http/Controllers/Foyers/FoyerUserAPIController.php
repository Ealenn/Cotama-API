<?php

namespace App\Http\Controllers\Foyers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Foyers\FoyerJoinRequest;
use App\Http\Requests\Foyers\FoyerUserExcludeRequest;
use App\Models\Foyers\Foyer;
use App\Services\FoyerService;
use App\User;

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
     * - 403 : Clef invalide | Invalid key
     *
     * @param \App\Http\Requests\Foyers\FoyerJoinRequest $request
     * @param FoyerService $foyerService
     * @return \Illuminate\Http\Response
     */
    public function store(FoyerJoinRequest $request, FoyerService $foyerService)
    {
        $foyerService->addUser(
            $request->user(),
            $request->Foyer
        );

        return response()->json(
          $request->Foyer
            ->with('users')
            ->get()
        );
    }

    public function exclude(FoyerUserExcludeRequest $request, Foyer $Foyer, User $User, FoyerService $foyerService)
    {
        $result = $foyerService->deleteUser($User, $Foyer);
        return response()->json($Foyer, $result ? 200 : 403);
    }
}

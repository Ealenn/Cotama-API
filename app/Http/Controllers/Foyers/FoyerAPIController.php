<?php

namespace App\Http\Controllers\Foyers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Foyers\FoyerGetRequest;
use App\Http\Requests\Foyers\FoyerPutRequest;
use App\Http\Requests\Foyers\FoyerSaveRequest;
use App\Models\Foyers\Foyer;
use Illuminate\Http\Request;

/**
 * Class FoyerAPIController
 * @resource Foyers
 * @package App\Http\Controllers\Foyers
 */
class FoyerAPIController extends Controller
{
    /**
     * Tout les foyers | All homes
     *
     * - Retourne tout les foyers de l'utilisateur connecté
     * - Returns all home of the logged-in user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $User = $request->user();
        $Foyers = FoyerService::getFoyers($User->id);

        return response()->json($Foyers);
    }

    /**
     * Foyer specifique | Specified home
     *
     * - Retourne un foyer spécifique
     * - Returns a specific home
     *
     * ### /!\ **Attention : Warning**
     * - L'utilisateur connecté doit faire partie du foyer
     * - The connected user must be part of the household
     *
     * ### Paramètre : Parameter
     * - {foyer} : id
     *
     * @param  \App\Http\Requests\Foyers\FoyerGetRequest  $request
     * @param  Foyer $foyer
     * @return \Illuminate\Http\Response
     */
    public function show(FoyerGetRequest $request, Foyer $foyer)
    {
        $all = $foyer->getAll();
        return response()->json($all);
    }

    /**
     * Créer un foyer | Create house
     *
     * - Retourne le foyer créé
     * - Returns the created house
     *
     * @param  \App\Http\Requests\Foyers\FoyerSaveRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoyerSaveRequest $request)
    {
        $Foyer = FoyerService::create($request->all());
        return response()->json($Foyer);
    }

    /**
     * Modifier un foyer | Update house
     *
     * ### /!\ **Attention : Warning**
     * - L'utilisateur doit être admin du foyer
     * - The user must be admin of home
     *
     * ### Paramètre URL : URL Parameter
     * - {foyer} : id
     *
     * @param  \App\Http\Requests\Foyers\FoyerPutRequest $request
     * @param  \App\Models\Foyers\Foyer $foyer
     * @return \Illuminate\Http\Response
     */
    public function update(FoyerPutRequest $request, Foyer $foyer)
    {
        $foyer->update($request->all());
        return response()->json($foyer);
    }
}

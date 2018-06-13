<?php

namespace App\Http\Controllers;

use App\Http\Requests\Missions\MissionsDeleteRequest;
use App\Http\Requests\Missions\MissionsSaveRequest;
use App\Models\Foyers\Foyer;
use App\Models\Mission\Mission;
use App\Services\MissionService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MissionApiController extends Controller
{
    /**
     * Toutes les missions | All missions
     *
     * - Retourne toutes les missions de l'utilisateur connecté
     * - Returns all missions of the logged-in user
     *
     * @param  \Illuminate\Http\Request $request
     * @param Foyer $foyer
     * @param MissionService $missionService
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Foyer $foyer, MissionService $missionService)
    {
        return response()->json($missionService->getMissions($foyer->id));
    }

    /**
     * Récupère une mission.
     * @param Request $request
     * @param Mission $mission
     * @param MissionService $missionService
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request, Mission $mission, MissionService $missionService)
    {
        return response()->json($missionService->getMissionById($mission->id));
    }

    /**
     * Récupère toutes les missions de l'user connecté.
     * @param Request $request
     * @param MissionService $missionService
     * @return \Illuminate\Http\JsonResponse
     */
    public function showAll(Request $request, MissionService $missionService) {
        return response()->json($missionService->getMissionsByUserId(Auth::user()->id));
    }

    /**
     * Ajoute une mission.
     * @param MissionsSaveRequest $request
     * @param MissionService $missionsService
     * @return la mission créée au format json
     */
    public function store(MissionsSaveRequest $request, MissionService $missionsService) {
        $params = ['title' => $request->get('title'), 'date_start' => $request->get('date_start')];
        $foyer =  Foyer::find($request->get('foyer_id'));
        $houseworkIds = $request->get('housework_ids');

        $user = Auth::user();
        $mission = $missionsService->create($user, $foyer, $houseworkIds, $params);
        $missionsService->assignHouseworkToUser($mission);
        return response()->json($missionsService->getMissionById($mission->id));
    }

    /**
     * Suppression d'une mission.
     * @param MissionsDeleteRequest $request
     * @param Mission $mission
     * @param MissionService $missionService
     * @return \Illuminate\Http\Response|mixed
     */
    public function delete(MissionsDeleteRequest $request, Mission $mission, MissionService $missionService) {
        try {
            $missionService->delete($mission);
            return $this->index($request, $mission->foyer()->first(), new MissionService());
        } catch (\Exception $exception) {
            return $request->json("", 500);
        }
    }
}

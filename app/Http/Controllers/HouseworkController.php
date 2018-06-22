<?php

namespace App\Http\Controllers;

use App\Models\Housework;
use App\Services\HouseworkService;
use App\Services\MissionService;
use Illuminate\Http\Request;

/**
 * @resource Houseworks
 * @package App\Http\Controllers
 */
class HouseworkController extends Controller
{
    /**
     * Display a listing of the housework.
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return response()->json(Housework::all());
    }

    /**
     * Display the specified housework.
     * @param Request $request
     * @param Housework $housework
     * @return mixed
     */
    public function show(Request $request, Housework $housework)
    {
        return response()->json($housework);
    }

    /**
     * Met à jour l'état d'une tâche.
     * @param Request $request
     * @param HouseworkService $houseworkService
     * @param MissionService $missionService
     * @return Json data
     */
    public function updateState(Request $request, HouseworkService $houseworkService, MissionService $missionService){
        $params = $request->all();
        $houseworkService->updateState($params);
        $missionService->updateState($params);

        return response()->json($missionService->getMissionById($params['mission_id']));
    }
}

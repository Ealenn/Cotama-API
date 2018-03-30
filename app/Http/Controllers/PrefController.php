<?php

namespace App\Http\Controllers;

use App\Http\Requests\Prefs\PrefPutRequest;
use App\Models\Housework;
use App\Services\PrefsService;
use Illuminate\Http\Request;

/**
 * @resource Prefs
 * @package App\Http\Controllers
 */
class PrefController extends Controller
{
  /**
   * Display a listing of the prefs.
   * @param Request $request
   * @param PrefsService $prefs
   * @return mixed
   */
  public function index(Request $request, PrefsService $prefs)
  {
    return response()->json($prefs->getAll($request->user()));
  }

  /**
   * Display the specified prefs.
   * @param Request $request
   * @param PrefsService $prefs
   * @param Housework $housework
   * @return mixed
   */
  public function show(Request $request, PrefsService $prefs, Housework $housework)
  {
    return response()->json(
      $prefs->get($request->user(), $housework)
    );
  }

  /**
   * Update prefs
   * @param PrefPutRequest $request
   * @param PrefsService $prefs
   * @param Housework $housework
   * @return mixed
   */
  public function update(PrefPutRequest $request, PrefsService $prefs, Housework $housework)
  {
    return response()->json(
      $prefs->update($request->user(), $housework, $request->get('rating', 2.5))
    );
  }
}

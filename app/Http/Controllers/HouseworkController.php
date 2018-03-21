<?php

namespace App\Http\Controllers;

use App\Models\Housework;
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
}

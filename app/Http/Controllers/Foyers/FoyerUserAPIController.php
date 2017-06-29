<?php

namespace App\Http\Controllers\Foyers;

use App\Http\Controllers\Controller;
use App\Models\Foyers\Foyer;
use Illuminate\Http\Request;

class FoyerUserAPIController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param $request
     * @param $key String : Foyer Key
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $key)
    {
        $Foyer = Foyer::where('key', $key)->firstOrFail();
        Foyer::addUserFoyer($request->user(), $Foyer);
        return response()->json($Foyer);
    }
}

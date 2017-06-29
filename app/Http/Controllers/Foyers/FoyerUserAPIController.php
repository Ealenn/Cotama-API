<?php

namespace App\Http\Controllers\Foyers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Foyers\FoyerJoinRequest;
use App\Models\Foyers\Foyer;
use Illuminate\Http\Request;

class FoyerUserAPIController extends Controller
{

    /**
     * Store a newly created resource in storage.
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

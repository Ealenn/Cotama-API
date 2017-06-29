<?php

namespace App\Http\Controllers\Foyers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Foyers\FoyerGetRequest;
use App\Http\Requests\Foyers\FoyerPutRequest;
use App\Http\Requests\Foyers\FoyerSaveRequest;
use App\Models\Foyers\Foyer;
use Illuminate\Http\Request;

class FoyerAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $User = $request->user();
        $Foyers = Foyer::getAllForUser($User->id);

        return response()->json($Foyers);
    }

    /**
     * Display the specified resource.
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Foyers\FoyerSaveRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoyerSaveRequest $request)
    {
        $Foyer = Foyer::create($request->user(), $request->all());
        return response()->json($Foyer);
    }

    /**
     * Update the specified resource in storage.
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

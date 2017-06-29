<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserGetRequest;
use App\Http\Requests\Users\UserPutRequest;
use App\Http\Requests\Users\UserSaveRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class UsersAPIController extends Controller
{
    /**
     * Send tokken user
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Users\UserSaveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSaveRequest $request)
    {
        $user = new User(\Illuminate\Support\Facades\Request::all());
        $user->save();
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Http\Requests\Users\UserGetRequest  $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show(UserGetRequest $request, User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Users\UserPutRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(UserPutRequest $request)
    {
        $user = $request->user();
        $user->fill($request->all());
        $user->save();
        return $user;
    }

}

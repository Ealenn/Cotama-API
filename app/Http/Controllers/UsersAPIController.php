<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UserGetRequest;
use App\Http\Requests\Users\UserPutRequest;
use App\Http\Requests\Users\UserSaveRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

/**
 * @resource Users
 * @package App\Http\Controllers
 */
class UsersAPIController extends Controller
{
    /**
     * Retourner l'utilisateur connecté | Return Online User
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Création d'un utilisateur | Creating a user
     *
     * - Retourne l'utilisateur créé
     * - Return created user
     *
     * @param  \App\Http\Requests\Users\UserSaveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserSaveRequest $request)
    {
        $user = new User(\Illuminate\Support\Facades\Request::all());
        $user->setAttribute("password", bcrypt($user->getAuthPassword()));

        $user->save();
        return response()->json($user);
    }

    /**
     * Retourner un profil spécifique | Returns a specific profile
     *
     * ### /!\ **Attention : Warning**
     * - Les utilisateurs doivent partager au moins un foyer
     * - Users must share at least one household
     *
     * ### Paramètre URL : URL Parameter
     * - {user} : id
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
     * Modifier l'utilisateur connecté | Edit user logged in
     *
     * - Retourne l'utilisateur modifier
     * - Returns the user edited
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

<?php

namespace App\Services;


use App\Models\Foyers\Foyer;
use App\Models\Foyers\FoyerUser;
use App\Models\Mission\Mission;
use App\User;
use Illuminate\Support\Collection;

class MissionService {

    /**
     * Ajoute une mission.
     * @param User $user
     * @param array $houseworkIds
     * @param Foyer $foyer
     * @param array $params
     * @return Mission
     */
    public function create(User $user, Foyer $foyer, array $houseworkIds, array $params) : Mission {
        $mission = new Mission($params);
        $mission->foyer()->associate($foyer);
        $mission->user()->associate($user);

        $mission->save();

        $arr = [];
        foreach ($houseworkIds as $houseworkId) {
            $arr[$houseworkId] = ['user_id' => $user->id];
        }
        $mission->houseworks()->attach($arr);
        return $mission;
    }

    public function assignHouseworkToUser(Mission $mission) {
        $foyer = $mission->foyer()->with('users')->first();
        $users = $foyer->users;
        $houseworks = $mission->houseworks->pluck('id');

        // Todo : Transformer $houseworks en obj => Pour comparer a l'historique

        // En attendant l'historique :
        $arr = [];
        foreach ($houseworks as $housework) {
            $arr[$housework] = ['user_id' => $users[mt_rand(0, (sizeof($users) - 1))]->id ];
        }

        // Update
        $mission->houseworks()->sync($arr);
    }

    /**
     * Récupère la mission avec les tâches, l'utilisateur et le foyer.
     * @param int $id
     * @return Mission
     */
    public function getMissionById(int $id) : Mission {
        return Mission::find($id)->with('houseworks', 'user', 'foyer')->where('id', $id)->first();
    }

    /**
     * Récupère la liste des missions.
     * @param int $id id du foyer
     * @return Collection
     */
    public function getMissions(int $id) : Collection {
        return Mission::where('foyer_id', $id)->with('houseworks', 'user', 'foyer')->get();
    }

    /**
     * Récupère les missions
     * @param int $id
     * @return mixed
     */
    public function getMissionsByUserId(int $id) : Collection {
        $foyer_ids = FoyerUser::where('user_id', $id)->pluck('foyer_id');
        $missions = Mission::whereIn('foyer_id', $foyer_ids)->orderBy('date_start', 'asc')->with('houseworks', 'user', 'foyer')->get();
        return $missions;
    }

    /**
     * Suppression d'une mission.
     * @param Mission $mission
     * @throws \Exception
     */
    public function delete(Mission $mission) {
        $ids = $mission->houseworks->pluck('id');
        $mission->houseworks()->detach($ids);
        $mission->delete();
    }

    /**
     * Seul l'user qui a créé la mission peut la supprimer.
     * @param User $user
     * @param Mission $mission
     * @return bool
     */
    public function canDelete(User $user, Mission $mission) {
        return $mission->user()->first()->id == $user->id ? true : false;
    }
}
<?php

namespace App\Cotama\Repositories\Eloquent;

use App\Cotama\Repositories\Interfaces\FoyerInterface;
use App\Models\Foyers\Foyer;
use App\Models\Foyers\FoyerUser;
use App\User;

/**
 * Class FoyerRepository
 * @package App\Cotama\Repositories\Eloquent
 */
class FoyerRepository extends RepositoryEloquent implements FoyerInterface{

    /**
     * Implement user model
     * @return string
     */
    function model()
    {
        return 'App\Models\Foyers\Foyer';
    }

    /**
     * @param $arrayFoyer
     * @return Foyer
     */
    public function create($arrayFoyer)
    {
        $this->model = new Foyer($arrayFoyer);
        $this->model->save();
        return $this->model;
    }

    /**
     * @param $user
     * @param $foyer
     * @return bool
     */
    public function isInFoyer($user, $foyer)
    {
        $userInFoyer = $this->getUserFoyer($user, $foyer);
        return $userInFoyer != null ? true : false;
    }

    /**
     * @param $user
     * @param $foyer
     */
    public function addUserToFoyer($user, $foyer, $isAdmin)
    {
        FoyerUser::create([
            'foyer_id' => $foyer->id,
            'user_id' => $user->id,
            'is_admin' => $isAdmin,
        ]);
    }

    public function isAdminFoyer($user, $foyer)
    {
        $isAdmin = false;
        $userIsAdminInFoyer = $this->getUserFoyer($user, $foyer);

        if($userIsAdminInFoyer != null){
            $isAdmin = $userIsAdminInFoyer->is_admin == 1 ? true : false;
        }
        return $isAdmin;
    }

    public function delete($user, $foyer)
    {
        $userFoyer = $this->getUserFoyer($user, $foyer);
        $userFoyer->delete();
    }

    public function getUsers($idFoyer)
    {
        return $this->model->find($idFoyer)->users;
    }

    public function getFoyers($idUser)
    {
        return User::find($idUser)->foyers;
    }

    private function getUserFoyer($user, $foyer){
       return FoyerUser::where('user_id',$user->id)
            ->where('foyer_id',$foyer->id)
            ->first();
    }
}
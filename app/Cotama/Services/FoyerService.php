<?php

namespace App\Cotama\Services;

use App\Cotama\Repositories\Interfaces\FoyerInterface;
use App\Events\FoyerUserDelete;
use App\Events\FoyerUserJoin;
use App\Events\FoyerWasCreated;

/**
 * Class FoyerService
 * @package App\Cotama\Services
 */
class FoyerService {

    /**
     * @var FoyerInterface
     */
    protected $foyerRepo;

    /**
     * FoyerService constructor.
     * @param FoyerInterface $foyerRepo
     */
    public function __construct(FoyerInterface $foyerRepo) {
        $this->foyerRepo = $foyerRepo;
    }

    /**
     * créer un nouveau foyer et ajoute l'utilisateur connecté 
     * en tant qu'admin
     * @param $arrayFoyer
     */
    public function create($arrayFoyer){

        $foyer = $this->foyerRepo->create($arrayFoyer);
        $user = Auth::user();

        if($this->foyerRepo->isInFoyer($user, $foyer)){
            $this->foyerRepo->addUserToFoyer($user,$foyer,true);

            event(new FoyerWasCreated($user, $foyer));
            event(new FoyerUserJoin($user, $foyer));
        }
    }

    public function delete($user, $foyer){
        if($this->foyerRepo->isInFoyer($user, $foyer)){
            $this->foyerRepo->delete($user, $foyer);
            event(new FoyerUserDelete($user, $foyer));
        }
    }

    public function addUserToFoyer($user, $foyer, $isAdmin){
        $this->foyerRepo->addUserToFoyer($user,$foyer,$isAdmin);
    }

    public function getUsers($idFoyer){
        $this->foyerRepo->getUsers($idFoyer);
    }

    public function getFoyers($idUser){
        $this->foyerRepo->getFoyers($idUser);
    }

    public function isInFoyer($user, $foyer){
        $this->foyerRepo->isInFoyer($user, $foyer);
    }

    public function isAdminFoyer($user, $foyer){
        $this->foyerRepo->isAdminFoyer($user, $foyer);
    }

}
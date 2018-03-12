<?php

namespace App\Cotama\Repositories\Interfaces;

/**
 * Interface FoyerInterface
 * Interface contenant les custom query spécifique à FoyerModel
 * @package App\Cotama\Interfaces
 */
interface FoyerInterface {
    public function create($arrayFoyer);
    public function isInFoyer($user, $foyer);
    public function addUserToFoyer($user, $foyer, $isAdmin);
    public function isAdminFoyer($user, $foyer);
    public function delete($user, $foyer);
    public function getUsers($idFoyer);
    public function getFoyers($idUser);
}
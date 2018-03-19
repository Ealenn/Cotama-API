<?php

namespace App\Services;

use App\User;
use \App\Models\Foyers\Foyer;

class FoyerService {

  /**
   * Create Foyer
   * @param \App\User $user User
   * @param $arrayFoyer
   * @return \App\Models\Foyers\Foyer $newFoyer
   */
  public function create(User $user, Array $arrayFoyer) : Foyer
  {
    $newFoyer = new Foyer($arrayFoyer);
    $newFoyer->save();
    $this->addUser($user, $newFoyer, true);

    event(new \App\Events\FoyerWasCreated($user, $newFoyer));
    return $newFoyer;
  }

  /**
   * Add user in foyer
   * @param User $user User
   * @param \App\Models\Foyers\Foyer $foyer Foyer
   * @param bool $isAdmin
   * @return bool check if success
   */
  public function addUser(User $user, Foyer $foyer, bool $isAdmin = false) : bool
  {
    if(!$this->isInFoyer($user, $foyer))
    {
      $foyer->users()->attach($user, ['is_admin' => $isAdmin]);
      event(new \App\Events\FoyerUserJoin($user, $foyer));
      return true;
    }
    return false;
  }

  /**
   * User is in foyer
   * @param \App\User $user User or id_user
   * @param \App\Models\Foyers\Foyer $foyer Foyer or id_foyer
   * @return bool
   */
  public function isInFoyer(User $user, Foyer $foyer) : bool {
    $isInFoyer = false;
    $foyer_users = $foyer->users()->get();

    foreach ($foyer_users as $foyer_user) {
      if($foyer_user->id === $user->id) {
        $isInFoyer = true;
        break;
      }
    }

    return $isInFoyer;
  }

  /**
   * User is friend
   * @param User $user1 || Int $user1
   * @param User $user2 || Int $user2
   * @return bool
   */
  public function isFriend(User $user1, User $user2) : bool
  {
    foreach ($user1->foyers()->get() as $Foyer1) {
      foreach ($user2->foyers()->get() as $Foyer2) {
        if($Foyer1->foyer_id == $Foyer2->foyer_id){
          return true;
        }
      }
    }

    return false;
  }

  /**
   * Check if User is admin
   * @param User $user User or id_user
   * @param Foyer $foyer Foyer or id_foyer
   * @return bool
   */
  public function isAdmin(User $user, Foyer $foyer) : bool
  {
    $AdminOfFoyer = $foyer
      ->users()
      ->where('user_id', '=', $user->id)
      ->wherePivot('is_admin', '=', true)
      ->first();

    return $AdminOfFoyer ? true : false;
  }

  /**
   * Delete user in foyer
   * @param User $user User or id_user
   * @param Foyer $foyer Foyer or id_foyer
   * @return bool check success
   */
  public function deleteUser(User $user, Foyer $foyer) : bool
  {
    if($this->isInFoyer($user, $foyer)){
      $foyer->users()->detach($user);
      return true;
    }
    return false;
  }

  /**
   * Remove Foyer
   * @param Foyer $foyer
   * @throws \Exception
   */
  public function deleteFoyer(Foyer $foyer)
  {
    foreach ($foyer->users as $user) {
      $this->deleteUser($user, $foyer);
    }
    $foyer->delete();
  }
}

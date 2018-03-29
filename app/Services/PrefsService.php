<?php

namespace App\Services;

use App\Models\Housework;
use App\Models\Prefs;
use App\User;

class PrefsService {


  /**
   * @param User $user
   * @param Housework $housework
   * @return Prefs
   */
  public function get(User $user, Housework $housework) : Prefs
  {
    $Pref = Prefs::where('housework_id', '=', $housework->id)
      ->where('user_id', '=', $user->id)
      ->first();

    if(!$Pref) {
      $Pref = new Prefs;
      $Pref->user()->associate($user);
      $Pref->housework()->associate($housework);
      $Pref->rating = 2.5;
      $Pref->save();
    }

    return $Pref;
  }

  /**
   * @param User $user
   * @return Array
   */
  public function getAll(User $user) : Array
  {
    $Houseworks = Housework::all();
    $Response = [];

    foreach ($Houseworks as $housework) {
      array_push($Response, $this->get($user, $housework));
    }

    return $Response;
  }

  /**
   * @param User $user
   * @param Housework $housework
   * @param float $rate
   * @return Prefs
   */
  public function update(User $user, Housework $housework, float $rate) : Prefs
  {
    $Pref = $this->get($user, $housework);
    $Pref->rating = $rate;
    $Pref->save();
    return $Pref;
  }

}

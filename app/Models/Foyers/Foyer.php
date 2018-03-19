<?php

namespace App\Models\Foyers;

use App\Events\FoyerUserDelete;
use App\Events\FoyerUserJoin;
use App\Events\FoyerWasCreated;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Foyer extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $defaults = array();

    public function __construct(array $attributes = array())
    {
        $this->defaults['key'] = uniqid();
        $this->setRawAttributes($this->defaults, true);

        parent::__construct($attributes);
    }

    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('is_admin')->withTimestamps();
    }








    /**
     * Get all foyer for one user id
     * @param $user User or id_user
     * @return array Foyer
     */
    public static function getAllForUser($user){
        $user_id = $user;
        if($user instanceof User){
            $user_id = $user->id;
        }

        $ArrayAllInfos = [];
        $FoyersUsers = FoyerUser::with('foyer')->where('user_id', $user_id)->get();

        foreach ($FoyersUsers as $FoyerUser) {
            array_push($ArrayAllInfos, Foyer::getAllForFoyer($FoyerUser->foyer));
        }

        return $ArrayAllInfos;
    }

    /**
     * Get all informations for foyer
     * @param Foyer $foyer
     * @return array Foyer
     */
    public static function getAllForFoyer(Foyer $foyer){
        $AllUsers = FoyerUser::with(['user'])->get()->where('foyer_id', $foyer->id);
        $ArrayUsers = [];
        $ArrayAdmin = [];

        foreach ($AllUsers as $User) {
            if($User->is_admin){
                array_push($ArrayAdmin, $User->user);
            }
            array_push($ArrayUsers, $User->user);
        }

        $ArrayFoyer = [];
        $ArrayFoyer['content'] = $foyer;
        $ArrayFoyer['admin'] = $ArrayAdmin;

        $All = [
            'foyer' => $ArrayFoyer,
            'users' => $ArrayUsers
        ];

        return $All;
    }











}

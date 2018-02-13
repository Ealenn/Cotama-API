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


    public function FoyerUser()
    {
        return $this->hasMany('App\Models\FoyerUser');
    }

    /**
     * Create Foyer
     * @param $user User or id_user
     * @param $arrayFoyer
     * @return Foyer
     */
    public static function create($user, $arrayFoyer)
    {
        $foyer = $arrayFoyer;
        if (!$arrayFoyer instanceof Foyer) {
            $foyer = new Foyer($arrayFoyer);
            $foyer->save();
        }

        if($user instanceof User){
            Foyer::addUserFoyer($user->id, $foyer->id, true);
        } else {
            Foyer::addUserFoyer($user, $foyer->id, true);
        }

        event(new FoyerWasCreated($user, $foyer));
        return $foyer;
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

    /**
     * All members and informations foyer
     * @return array
     */
    public function getAll(){
        return Foyer::getAllForFoyer($this);
    }

    /**
     * User is in foyer
     * @param $user User or id_user
     * @param $foyer Foyer or id_foyer
     * @return bool
     */
    public static function isInFoyer($user, $foyer){
        $id_user = $user;
        $id_foyer = $foyer;

        if($user instanceof User){
            $id_user = $user->id;
        }

        if($foyer instanceof Foyer){
            $id_foyer = $foyer->id;
        }

        $FoyerUser = DB::table('foyers_users')
            ->where('foyer_id', $id_foyer)
            ->where('user_id', $id_user)
            ->first();

        if($FoyerUser != null){
            return true;
        }

        return false;
    }

    /**
     * User is in foyer
     * @param $user User or id_user
     * @return bool
     */
    public function isIn($user){
        return Foyer::isInFoyer($user, $this);
    }

    /**
     * User is admin
     * @param $user User or id_user
     * @param $foyer Foyer or id_foyer
     * @return bool
     */
    public static function isAdminFoyer($user, $foyer){
        $id_user = $user;
        $id_foyer = $foyer;

        if($user instanceof User){$id_user = $user->id;}
        if($foyer instanceof Foyer){$id_foyer = $foyer->id;}

        $FoyerUser = DB::table('foyers_users')
            ->where('foyer_id', $id_foyer)
            ->where('user_id', $id_user)
            ->first();

        if($FoyerUser == null || $FoyerUser == false){
            return false;
        }

        return $FoyerUser->is_admin == 1;
    }

    /**
     * User is admin
     * @param $user User or id_user
     * @return bool
     */
    public function isAdmin($user){
        return Foyer::isAdminFoyer($user, $this);
    }

    /**
     * User is friend
     * @param User $user1 || Int $user1
     * @param User $user2 || Int $user2
     * @return bool
     */
    public static function isFriend($user1, $user2){
        $id_user1 = $user1;
        $id_user2 = $user2;

        if($user1 instanceof User){$id_user1 = $user1->id;}
        if($user2 instanceof User){$id_user2 = $user2->id;}

        $FoyersUser1 = DB::table('foyers_users')
            ->where('user_id', $id_user1)
            ->get();

        $FoyersUser2 = DB::table('foyers_users')
            ->where('user_id', $id_user2)
            ->get();

        foreach ($FoyersUser1 as $Foyer1) {
            foreach ($FoyersUser2 as $Foyer2) {
                if($Foyer1->foyer_id == $Foyer2->foyer_id){
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Add user in foyer
     * @param $user User or id_user
     * @param $foyer Foyer or id_foyer
     * @param bool $isAdmin
     * @return bool check if success
     */
    public static function addUserFoyer($user, $foyer, $isAdmin = false){
        $id_user = $user;
        $id_foyer = $foyer;

        if($user instanceof User){$id_user = $user->id;}
        if($foyer instanceof Foyer){$id_foyer = $foyer->id;}

        if(!Foyer::isInFoyer($id_user, $id_foyer)){

            DB::table('foyers_users')->insert(
                [
                    'user_id' => $id_user,
                    'foyer_id' => $id_foyer,
                    'is_admin' => $isAdmin
                ]
            );

            // Event
            if($user instanceof User && $foyer instanceof Foyer){
                event(new FoyerUserJoin($user, $foyer));
            } else {
                event(new FoyerUserJoin($id_user, $id_foyer));
            }

            return true;
        }

        return false;
    }

    /**
     * Add user in foyer
     * @param $user User or id_user
     * @param bool $isAdmin
     * @return bool check if success
     */
    public function addUser($user, $isAdmin = false){
        return Foyer::addUserFoyer($user, $this, $isAdmin);
    }

    /**
     * Delete user in foyer
     * @param $user User or id_user
     * @param $foyer Foyer or id_foyer
     * @return bool check success
     */
    public static function deleteUserFoyer($user, $foyer){
        $id_user = $user;
        $id_foyer = $foyer;

        if($user instanceof User){$id_user = $user->id;}
        if($foyer instanceof Foyer){$id_foyer = $foyer->id;}

        if(Foyer::isInFoyer($id_user, $id_foyer)){
            DB::table('foyers_users')
                ->where('user_id', $id_user)
                ->where('foyer_id', $id_foyer)
                ->delete();

            // Event
            if($user instanceof User && $foyer instanceof Foyer){
                event(new FoyerUserDelete($user, $foyer));
            } else {
                event(new FoyerUserDelete($id_user, $id_foyer));
            }

            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete user in foyer
     * @param $user User or id_user
     * @return bool check success
     */
    public function deleteUser($user){
        return Foyer::deleteUserFoyer($user, $this);
    }
}

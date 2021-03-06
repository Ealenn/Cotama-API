<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo', 'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function foyers()
    {
      return $this->belongsToMany('App\Models\Foyers\Foyer');
    }

    public function prefs()
    {
      return $this->hasMany('App\Models\Prefs');
    }

    public function missions()
    {
        return $this->hasMany('App\Models\Mission');
    }
}

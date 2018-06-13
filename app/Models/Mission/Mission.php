<?php

namespace App\Models\Mission;


use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $fillable = [
        'title', 'date_start'
    ];

    public function houseworks()
    {
        return $this->belongsToMany('App\Models\Housework', 'mission_housework')->withPivot('user_id')->withTimestamps();
    }

    public function foyer()
    {
        return $this->belongsTo('App\Models\Foyers\Foyer')->with('users');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

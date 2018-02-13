<?php

namespace App\Models\Foyers;

use Illuminate\Database\Eloquent\Model;

class FoyerUser extends Model
{
    protected $table = "foyers_users";

    protected $fillable = [
        'is_admin'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function foyer()
    {
        return $this->belongsTo('App\Models\Foyers\Foyer');
    }
}

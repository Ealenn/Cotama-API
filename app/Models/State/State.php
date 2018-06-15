<?php

namespace App\Models\State;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'fr', 'en', 'de',
    ];
}

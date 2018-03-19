<?php

namespace App\Models\Foyers;

use Illuminate\Database\Eloquent\Model;

class FoyerUser extends Model
{
    protected $table = "foyer_user";

    protected $fillable = [
        'is_admin'
    ];
}

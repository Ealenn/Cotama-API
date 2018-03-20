<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Housework extends Model
{
  public $timestamps = false;

  protected $fillable = [
    'fr', 'en', 'de',
  ];
}

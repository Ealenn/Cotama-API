<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefs extends Model
{
  protected $fillable = ['rating'];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function housework()
  {
    return $this->belongsTo('App\Models\Housework');
  }
}

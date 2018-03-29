<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class PrefsFacade extends Facade{
  protected static function getFacadeAccessor() { return 'PrefsService'; }
}

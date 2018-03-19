<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class FoyerFacade extends Facade{
  protected static function getFacadeAccessor() { return 'FoyerService'; }
}

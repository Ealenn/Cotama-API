<?php

namespace Tests\Unit;

use App\Facades\FoyerFacade;
use App\Facades\PrefsFacade;
use App\Models\Foyers\Foyer;
use App\Models\Housework;
use App\Services\PrefsService;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\PassportTestCase;

class PrefsServiceTest extends PassportTestCase
{
  public function setUp () {
      parent::setUp();
  }

  public function testGet()
  {
    $User = factory(User::class)->create();
    $Housework = factory(Housework::class)->create();
    $Prefs = PrefsFacade::get($User, $Housework);

    $this->assertEquals(2.5, $Prefs->rating);
  }

  public function testGetAll()
  {
    $User = factory(User::class)->create();
    $Housework1 = factory(Housework::class)->create();
    $Housework2 = factory(Housework::class)->create();
    $Housework3 = factory(Housework::class)->create();

    $Prefs = PrefsFacade::getAll($User);
    $this->assertEquals(sizeof($Prefs), 3);
  }

  public function testUpdate()
  {
    $User = factory(User::class)->create();
    $Housework = factory(Housework::class)->create();
    $Prefs = PrefsFacade::get($User, $Housework);
    $this->assertEquals(2.5, $Prefs->rating);

    $Prefs = PrefsFacade::update($User, $Housework, 5);
    $this->assertEquals(5, $Prefs->rating);
    $this->assertEquals($Housework->id, $Prefs->housework->id);

    $Prefs = PrefsFacade::get($User, $Housework);
    $this->assertEquals(5, $Prefs->rating);
  }

}

<?php

namespace Tests\Unit;

use App\Facades\FoyerFacade;
use App\Models\Foyers\Foyer;
use App\User;
use Illuminate\Support\Facades\DB;
use Tests\PassportTestCase;

class FoyerServiceTest extends PassportTestCase
{
  public function setUp(){
      parent::setUp();
  }

  public function testCreate()
  {
    $User = factory(User::class)->create();
    $Foyer = factory(Foyer::class)->make();
    $newFoyer = FoyerFacade::create($User, ['name' => $Foyer->name]);

    $this->assertEquals($Foyer->name, $newFoyer->name);
  }

  public function testCreateDataBase()
  {
    $User = factory(User::class)->create();
    $Foyer = factory(Foyer::class)->make();
    $newFoyer = FoyerFacade::create($User, ['name' => $Foyer->name]);

    $this->assertEquals($Foyer->name, Foyer::find($newFoyer->id)->name);
  }

  public function testAddUser() {
    $User = factory(User::class)->create();
    $newFoyer = FoyerFacade::create($User, ['name' => "fds"]);
    $this->assertEquals(1, $newFoyer->users()->get()->count());

    FoyerFacade::addUser($this->user, $newFoyer);
    $this->assertEquals(2, $newFoyer->users()->get()->count());
  }

  public function testIsInFoyer() {
    $User = factory(User::class)->create();
    $newFoyer = FoyerFacade::create($User, ['name' => "grgdfb"]);

    $this->assertEquals(true, FoyerFacade::isInFoyer($User, $newFoyer));
    $this->assertEquals(false, FoyerFacade::isInFoyer($this->user, $newFoyer));
  }

  public function testIsFriend() {
    $Foyer1 = FoyerFacade::create($this->user, ['name' => "grgdfb"]);
    $Foyer2 = FoyerFacade::create($this->user, ['name' => "grgdfb"]);
    $User = factory(User::class)->create();

    $this->assertEquals(false, FoyerFacade::isFriend($this->user, $User));
    FoyerFacade::addUser($User, $Foyer2);
    $this->assertEquals(true, FoyerFacade::isFriend($this->user, $User));
  }

  public function testIsAdmin() {
    $User = factory(User::class)->create();
    $Foyer = FoyerFacade::create($this->user, ['name' => "plopm"]);
    $Foyer2 = FoyerFacade::create($User, ['name' => "plopm"]);
    FoyerFacade::addUser($User, $Foyer);

    $this->assertEquals(true, FoyerFacade::isAdmin($this->user, $Foyer));
    $this->assertEquals(false, FoyerFacade::isAdmin($User, $Foyer));
    $this->assertEquals(false, FoyerFacade::isAdmin($this->user, $Foyer2));
  }

  public function testDeleteUser() {
    $User = factory(User::class)->create();
    $newFoyer = FoyerFacade::create($this->user, ['name' => "grgdfb"]);

    $this->assertEquals(false, FoyerFacade::isInFoyer($User, $newFoyer));
    $this->assertEquals(false, FoyerFacade::deleteUser($User, $newFoyer));

    FoyerFacade::addUser($User, $newFoyer);
    $this->assertEquals(true, FoyerFacade::isInFoyer($User, $newFoyer));
    $this->assertEquals(true, FoyerFacade::deleteUser($User, $newFoyer));
    $this->assertEquals(false, FoyerFacade::isInFoyer($User, $newFoyer));
  }

  public function testDeleteFoyer()
  {
    $Foyer = FoyerFacade::Create($this->user, ["name"=>"UnIqUeFoRtEsT"]);
    FoyerFacade::deleteFoyer($Foyer);

    $this->assertEquals(0, Foyer::where('name', 'UnIqUeFoRtEsT')->count());
    $this->assertEquals(false, FoyerFacade::isInFoyer($this->user, $Foyer));
  }

}

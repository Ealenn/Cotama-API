<?php

namespace Tests\Feature;

use App\Facades\FoyerFacade;
use App\Models\Foyers\Foyer;
use App\User;
use Tests\PassportTestCase;

class FoyersAPITest extends PassportTestCase
{

  public function setUp(){
      parent::setUp();
  }

  /*
   * -----------------------------
   *          GET Foyer
   * -----------------------------
   */

  public function testGetFoyerNotConnected()
  {
    $response = $this->call('GET', '/api/foyer');
    $this->assertEquals(401, $response->getStatusCode());
  }

  public function testGetFoyers()
  {
    $Foyer = FoyerFacade::create($this->user, ["name"=>"Test"]);
    $response = $this->get('/api/foyer', $this->headers);
    $json = json_decode($response->getContent())[0];

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals("Test", $json->name);
    $this->assertEquals($this->user->id, $json->users[0]->id);
  }

  public function testGetFoyerId()
  {
    $Foyer = FoyerFacade::create($this->user, ["name"=>"Test"]);
    $response = $this->get('/api/foyer/' . $Foyer->id, $this->headers);
    $json = json_decode($response->getContent())[0];

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals("Test", $json->name);
    $this->assertEquals($this->user->id, $json->users[0]->id);
  }

  /*
   * -----------------------------
   *          POST FOYER
   * -----------------------------
  */

  public function testPostFoyer()
  {
    $foyer = factory(Foyer::class)->make();

    $response = $this->post('/api/foyer', ['name' => $foyer->name]);
    $json = json_decode($response->getContent());

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals($foyer->name, $json->name);
  }

  /*
   * -----------------------------
   *          PUT FOYER
   * -----------------------------
   */

  public function testPutFoyer()
  {
    $Foyer = factory(Foyer::class)->create();
    FoyerFacade::addUser($this->user, $Foyer, true);

    $response = $this->put('/api/foyer/' . $Foyer->id, [
      'name' => 'ChangeName'
    ], $this->headers);
    $json = json_decode($response->getContent());

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals('ChangeName', $json->name);
  }

  public function testPutFoyerNotAdmin()
  {
    $Foyer = factory(Foyer::class)->create();
    FoyerFacade::addUser($this->user, $Foyer, false);

    $response = $this->put('/api/foyer/' . $Foyer->id, [
      'name' => 'ChangeName'
    ], $this->headers);
    $json = json_decode($response->getContent());

    $this->assertEquals(403, $response->getStatusCode());
  }

  /*
   * -----------------------------
   *          ADD USER FOYER
   * -----------------------------
   */

  public function testGetFoyerJoin()
  {
    $Foyer = factory(Foyer::class)->create();
    $response = $this->post('/api/foyer/join/', [
      'key' => $Foyer->key
    ], $this->headers);
    $json = json_decode($response->getContent());

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals(true, FoyerFacade::isInFoyer($this->user, $Foyer));
  }

  public function testGetFoyerJoinErrorKey()
  {
    $Foyer = factory(Foyer::class)->create();
    $response = $this->post('/api/foyer/join/', [
      'key' => 'NOT_GOOD'
    ], $this->headers);
    $json = json_decode($response->getContent());

    $this->assertEquals(403, $response->getStatusCode());
    $this->assertEquals(false, FoyerFacade::isInFoyer($this->user, $Foyer));
  }

  /*
   * -----------------------------
   *          DELETE FOYER
   * -----------------------------
   */

  public function testDeleteFoyer()
  {
    $Foyer = FoyerFacade::Create($this->user, ["name"=>"DeLeTeUnIqUeFoRtEsT"]);

    $response = $this->delete('/api/foyer/'.$Foyer->id, $this->headers);
    $json = json_decode($response->getContent());

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals(false, FoyerFacade::isInFoyer($this->user, $Foyer));
  }

  /*
   * -----------------------------
   *          DELETE USER FOYER
   * -----------------------------
   */

    public function testDeleteUserInFoyer()
    {
        $Foyer = FoyerFacade::Create($this->user, ["name"=>"Test"]);
        $User = factory(User::class)->create();
        FoyerFacade::addUser($User, $Foyer, false);

        $this->assertEquals(true, FoyerFacade::isInFoyer($User, $Foyer));

        $response = $this->delete('/api/foyer/'.$Foyer->id.'/exclude/'.$User->id, $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(false, FoyerFacade::isInFoyer($User, $Foyer));
    }

    public function testDeleteThisUserInFoyer()
    {
        $User = factory(User::class)->create();
        $Foyer = FoyerFacade::Create($User, ["name"=>"Test"]);
        FoyerFacade::addUser($this->user, $Foyer, false);

        $this->assertEquals(true, FoyerFacade::isInFoyer($this->user, $Foyer));

        $response = $this->delete('/api/foyer/'.$Foyer->id.'/exclude/'.$this->user->id, $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(false, FoyerFacade::isInFoyer($this->user, $Foyer));
    }

    public function testDeleteFakeUserInFoyer()
    {
        $Foyer = FoyerFacade::Create($this->user, ["name"=>"Test"]);
        $User = factory(User::class)->create();

        $this->assertEquals(false, FoyerFacade::isInFoyer($User, $Foyer));

        $response = $this->delete('/api/foyer/'.$Foyer->id.'/exclude/'.$User->id, $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(403, $response->getStatusCode());
    }

    public function testDeleteUserNotAdminInFoyer()
    {
        $User = factory(User::class)->create();
        $Foyer = FoyerFacade::Create($User, ["name"=>"Test"]);
        FoyerFacade::addUser($this->user, $Foyer, false);

        $this->assertEquals(false, FoyerFacade::isAdmin($this->user, $Foyer));

        $response = $this->delete('/api/foyer/'.$Foyer->id.'/exclude/'.$User->id, $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(403, $response->getStatusCode());
        $this->assertEquals(true, FoyerFacade::isInFoyer($User, $Foyer));
    }

    public function testDeleteUserNotInFoyer()
    {
        $User = factory(User::class)->create();
        $Foyer = FoyerFacade::Create($User, ["name"=>"Test"]);

        $this->assertEquals(false, FoyerFacade::isInFoyer($this->user, $Foyer));

        $response = $this->delete('/api/foyer/'.$Foyer->id.'/exclude/'.$User->id, $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(403, $response->getStatusCode());
        $this->assertEquals(true, FoyerFacade::isInFoyer($User, $Foyer));
    }

}

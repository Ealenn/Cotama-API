<?php

namespace Tests\Feature;

use App\Facades\FoyerFacade;
use App\Models\Foyers\Foyer;
use App\Models\Housework;
use App\User;
use Illuminate\Support\Facades\DB;
use Tests\PassportTestCase;

class PrefsTest extends PassportTestCase
{

  public function setUp(){
      parent::setUp();

      DB::table('houseworks')->insert(
        [
          [
            'b64' => 'd4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI',
            'fr' => 'tr ghgfdsgf',
            'en' => 'oiutyredfg',
            'de' => 'opmlkjhgf',
            'color' => '#A1887F'
          ],
          [
            'b64' => 'hGFEdrftyvuHBiuyvtceRtyui',
            'fr' => 'gfdgfdg',
            'en' => 'uyretgf',
            'de' => 'gvxfds',
            'color' => '#A1887F'
          ]
        ]
      );
  }

  public function testGetPrefs()
  {
    $response = $this->get('/api/prefs', $this->headers);
    $json = json_decode($response->getContent());

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals(2, sizeof($json));
  }

  public function testGetPrefsForFriend()
  {
    $User = factory(User::class)->create();
    $Foyer = factory(Foyer::class)->make();
    $newFoyer = FoyerFacade::create($User, ['name' => $Foyer->name]);
    FoyerFacade::addUser($this->user, $newFoyer);

    $response = $this->get('/api/prefs/user/' . $User->id, $this->headers);
    $json = json_decode($response->getContent());

    $this->assertEquals(200, $response->getStatusCode());
  }

  public function testGetPrefsForNotFriend()
  {
    $User = factory(User::class)->create();

    $response = $this->get('/api/prefs/user/' . $User->id, $this->headers);
    $json = json_decode($response->getContent());

    $this->assertEquals(403, $response->getStatusCode());
  }

  public function testGetPrefsOneHouseworks()
  {
    $Housework = Housework::take(1)->first();
    $response = $this->get('/api/prefs/' . $Housework->id, $this->headers);

    $json = json_decode($response->getContent());

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals($Housework->id, $json->housework->id);
    $this->assertEquals($this->user->id, $json->user->id);
    $this->assertEquals(2.5, $json->rating);
  }

  public function testPutPref()
  {
    $Housework = Housework::take(1)->first();
    $response = $this->put('/api/prefs/' . $Housework->id, [
      'rating' => 5
    ], $this->headers);

    $json = json_decode($response->getContent());

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals($Housework->id, $json->housework->id);
    $this->assertEquals($this->user->id, $json->user->id);
    $this->assertEquals(5, $json->rating);

    $response = $this->put('/api/prefs/' . $Housework->id, [
      'rating' => 0
    ], $this->headers);
    $this->assertEquals(200, $response->getStatusCode());

    $response = $this->put('/api/prefs/' . $Housework->id, [
      'rating' => 3
    ], $this->headers);
    $this->assertEquals(200, $response->getStatusCode());
  }

  public function testPutPrefError()
  {
    $Housework = Housework::take(1)->first();

    $response = $this->put('/api/prefs/' . $Housework->id, [
      'rating' => 6
    ], $this->headers);
    $this->assertEquals(422, $response->getStatusCode());

    $response = $this->put('/api/prefs/' . $Housework->id, [
      'rating' => -1
    ], $this->headers);
    $this->assertEquals(422, $response->getStatusCode());

    $response = $this->put('/api/prefs/' . $Housework->id, [
      'rating' => 'text'
    ], $this->headers);
    $this->assertEquals(422, $response->getStatusCode());
  }

}

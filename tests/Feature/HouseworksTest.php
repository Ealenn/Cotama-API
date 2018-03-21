<?php

namespace Tests\Feature;

use App\Facades\FoyerFacade;
use App\Models\Foyers\Foyer;
use App\Models\Housework;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Tests\PassportTestCase;

class HouseworksTest extends PassportTestCase
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

  public function testGetHouseworks()
  {
    $response = $this->get('/api/houseworks', $this->headers);
    $json = json_decode($response->getContent());

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals(2, sizeof($json));
  }

  public function testGetOneHouseworks()
  {
    $Housework = Housework::take(1)->first();
    $response = $this->get('/api/houseworks/' . $Housework->id, $this->headers);

    $json = json_decode($response->getContent());

    $this->assertEquals(200, $response->getStatusCode());
    $this->assertEquals($Housework->id, $json->id);
    $this->assertEquals($Housework->fr, $json->fr);
  }

}

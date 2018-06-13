<?php

namespace Tests\Feature;

use App\Facades\FoyerFacade;
use App\Facades\MissionFacade;
use Tests\PassportTestCase;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MissionApiTest extends PassportTestCase
{
    public function setUp(){
        parent::setUp();
    }

    public function testGetMissionNotConnected()
    {
        $response = $this->call('POST', '/api/missions');
        $this->assertEquals(401, $response->getStatusCode());
    }

    public function testGetMissionsByFoyer()
    {
        $Foyer = FoyerFacade::create($this->user, ["name"=>"Test"]);
        $mission = MissionFacade::create($this->user, $Foyer, [1,2,3], ["title"=>"aTitle" , "date_start"=>"2018/12/12"]);
        $response = $this->get('/api/missions/foyer/' . $Foyer->id, $this->headers);
        $json = json_decode($response->getContent())[0];

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals("aTitle", $json->title);
        $this->assertEquals("2018/12/12", $json->date_start);
        $this->assertEquals($this->user->id, $json->user->id);
        $this->assertEquals($Foyer->id, $json->foyer->id);
    }

    public function testShowMissionById(){
        $Foyer = FoyerFacade::create($this->user, ["name"=>"Test"]);
        $mission = MissionFacade::create($this->user, $Foyer, [1,2,3], ["title"=>"aTitle" , "date_start"=>"2018/12/12"]);

        $response = $this->get('/api/missions/' . $mission->id, $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals("aTitle", $json->title);
        $this->assertEquals("2018/12/12", $json->date_start);
    }

    public function testDeleteMission(){
        $Foyer = FoyerFacade::create($this->user, ["name"=>"Test"]);
        $mission = MissionFacade::create($this->user, $Foyer, [1,2,3], ["title"=>"aTitle" , "date_start"=>"2018/12/12"]);
        $missionSecond = MissionFacade::create($this->user, $Foyer, [4,5,6], ["title"=>"aSecondTitle" , "date_start"=>"2018/01/01"]);

        $response = $this->get('/api/missions/foyer/' . $Foyer->id, $this->headers);
        $this->assertEquals(200, $response->getStatusCode());

        $json = json_decode($response->getContent());
        $this->assertEquals(2, \count($json));

        $responseSecond = $this->delete('/api/missions/' . $mission->id, $this->headers);

        $jsonSecond = json_decode($responseSecond->getContent());
        $this->assertEquals(200, $responseSecond->getStatusCode());
        $this->assertEquals(1, \count($jsonSecond));

        $jsonSecond = $jsonSecond[0];
        $this->assertEquals("aSecondTitle", $jsonSecond->title);
        $this->assertEquals("2018/01/01", $jsonSecond->date_start);
    }

    public function testPostMission(){
        $Foyer = FoyerFacade::create($this->user, ["name"=>"Test"]);
        $response = $this->post('/api/missions', ['foyer_id'=>$Foyer->id, 'title'=>'aTitle', 'housework_ids'=>[1,2,3], 'date_start'=>'1528884365'], $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($Foyer->name, $json->foyer->name);
        $this->assertEquals($this->user->pseudo, $json->user->pseudo);
        $this->assertEquals('aTitle', $json->title);
        $this->assertEquals('2018-06-13 10:06:05', $json->date_start);
    }
}

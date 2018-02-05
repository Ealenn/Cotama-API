<?php

namespace Tests\Unit;

use App\Models\Foyers\Foyer;
use App\Models\Foyers\FoyerUser;
use App\User;
use Illuminate\Support\Facades\DB;
use Tests\PassportTestCase;

class FoyersAPITest extends PassportTestCase
{

    public function setUp(){
        parent::setUp();
    }

    /*
     * -----------------------------
     *          MODELS TEST
     * -----------------------------
     */

    public function testModelFoyerIsInFoyerMethode()
    {
        $Foyer = factory(Foyer::class)->create();
        $User1 = factory(User::class)->create();
        $User2 = factory(User::class)->create();
        $FoyerUser = factory(FoyerUser::class)->create([
            'foyer_id' => $Foyer->id,
            'user_id' => $User2->id
        ]);

        $this->assertEquals(false, $Foyer->isIn($User1->id));
        $this->assertEquals(true, $Foyer->isIn($User2->id));
    }

    public function testModelFoyerAddUserMethode()
    {
        $Foyer = factory(Foyer::class)->create();
        $User = factory(User::class)->create();
        $User2 = factory(User::class)->create();

        $Foyer->addUser($User->id);

        $this->assertEquals(true, $Foyer->isIn($User->id));
        $this->assertEquals(false, $Foyer->isIn($User2->id));
    }

    public function testModelFoyerIsAdminUserMethode()
    {
        $Foyer = factory(Foyer::class)->create();
        $User = factory(User::class)->create();
        $User2 = factory(User::class)->create();

        $Foyer->addUser($User->id, true);
        $Foyer->addUser($User2->id);

        $this->assertEquals(true, $Foyer->isAdmin($User->id));
        $this->assertEquals(false, $Foyer->isAdmin($User2->id));
    }

    public function testModelFoyerDeleteUserMethode()
    {
        $Foyer = factory(Foyer::class)->create();
        $User = factory(User::class)->create();
        $User2 = factory(User::class)->create();

        $Foyer->addUser($User->id, true);
        $Foyer->addUser($User2->id);

        $this->assertEquals(true, $Foyer->isIn($User->id));
        $this->assertEquals(true, $Foyer->isIn($User2->id));

        $Foyer->deleteUser($User2->id);

        $this->assertEquals(true, $Foyer->isIn($User->id));
        $this->assertEquals(false, $Foyer->isIn($User2->id));
    }

    public function testModelFoyerCreateMethode()
    {
        $User = factory(User::class)->create();

        $f = factory(Foyer::class)->make();
        $foyer = Foyer::create(
            $User,
            ['name' => $f->name]
        );

        $this->assertEquals(true, Foyer::isAdminFoyer($User, $foyer->id));
        $this->assertEquals(true, Foyer::isAdminFoyer($User, $foyer));
    }

    public function testModelFoyerAllForUserIdMethode()
    {
        $User = factory(User::class)->create();

        Foyer::create($User, factory(Foyer::class)->create());
        Foyer::create($User, factory(Foyer::class)->create());

        $AllFoyer = Foyer::getAllForUser($User);

        $this->assertEquals(2, sizeof($AllFoyer));
        $this->assertEquals(1, sizeof($AllFoyer[0]['users']));
    }

    /*
     * -----------------------------
     *          GET Foyer
     * -----------------------------
     */


    public function testGetFoyerNotConnected()
    {
        $response = $this->call('GET', '/api/foyer');
        $this->assertNotEquals(200, $response->getStatusCode());
        $this->assertNotEquals(500, $response->getStatusCode());
    }

    public function testGetFoyerWithConnection()
    {
        $response = $this->get('/api/foyer', $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetFoyerId()
    {
        $foyer = factory(Foyer::class)->make();
        $response = $this->post('/api/foyer', ['name' => $foyer->name], $this->headers);
        $jsonCreat = json_decode($response->getContent());

        $response = $this->get('/api/foyer/' . $jsonCreat->id, $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($foyer->name, $json->foyer->content->name);
        $this->assertEquals($this->user->id, $json->foyer->admin[0]->id);
    }

    /*
     * -----------------------------
     *          POST FOYER
     * -----------------------------
     */


    public function testPostFoyerConnected()
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
     *
     */

    public function testPutFoyerConnected()
    {
        $foyer = factory(Foyer::class)->make();

        $response = $this->post('/api/foyer', ['name' => $foyer->name]);
        $jsonPost = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($foyer->name, $jsonPost->name);

        // Put
        $foyer2 = factory(Foyer::class)->make();

        $response = $this->put('/api/foyer/' . $jsonPost->id, [
            'name' => $foyer2->name
        ], $this->headers);
        $jsonPut = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($jsonPut->name, $foyer2->name);
    }

    /*
     * -----------------------------
     *          ADD USER FOYER
     * -----------------------------
     *
     */
    public function testGetFoyerJoinConnected()
    {
        $foyer = factory(Foyer::class)->create();
        $response = $this->post('/api/foyer/join/', [
            'key' => $foyer->key
        ], $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(true, Foyer::isInFoyer($this->user, $foyer));
    }

    public function testGetFoyerJoinErrorConnected()
    {
        $foyer = factory(Foyer::class)->create();
        $response = $this->post('/api/foyer/join/', [
            'key' => $foyer->key . 'T'
        ], $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(403, $response->getStatusCode());
        $this->assertEquals(false, Foyer::isInFoyer($this->user, $foyer));
    }
}

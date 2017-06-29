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
        $id_user = $User['attributes']['id'];

        $foyer = Foyer::create($id_user, factory(Foyer::class)->make()['attributes']);

        $this->assertEquals(true, Foyer::isAdminFoyer($id_user, $foyer->id));
        $this->assertEquals(true, Foyer::isAdminFoyer($id_user, $foyer));
    }

    public function testModelFoyerAllForUserIdMethode()
    {
        $User = factory(User::class)->create();
        $id_user = $User['attributes']['id'];

        Foyer::create($id_user, factory(Foyer::class)->make()['attributes']);
        Foyer::create($id_user, factory(Foyer::class)->make()['attributes']);

        $AllFoyer = Foyer::getAllForUser($id_user);

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
        $this->assertEquals(401, $response->getStatusCode());
    }

    public function testGetFoyerWithConnection()
    {
        $response = $this->get('/api/foyer');
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testGetFoyerId()
    {
        $foyer = factory(Foyer::class)->make();
        $response = $this->post('/api/foyer', $foyer['attributes']);
        $jsonCreat = json_decode($response->getContent());

        $response = $this->get('/api/foyer/' . $jsonCreat->id);
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

        $response = $this->post('/api/foyer', $foyer['attributes']);
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

        $response = $this->post('/api/foyer', $foyer['attributes']);
        $jsonPost = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($foyer->name, $jsonPost->name);

        // Put
        $foyer2 = factory(Foyer::class)->make();

        $response = $this->put('/api/foyer/' . $jsonPost->id, [
            'name' => $foyer2->name
        ]);
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
        ]);
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(true, Foyer::isInFoyer($this->user, $foyer));
    }

    public function testGetFoyerJoinErrorConnected()
    {
        $foyer = factory(Foyer::class)->create();
        $response = $this->post('/api/foyer/join/', [
            'key' => $foyer->key . 'T'
        ]);
        $json = json_decode($response->getContent());

        $this->assertEquals(403, $response->getStatusCode());
        $this->assertEquals(false, Foyer::isInFoyer($this->user, $foyer));
    }
}
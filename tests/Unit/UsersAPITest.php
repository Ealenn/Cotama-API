<?php

namespace Tests\Unit;

use App\User;
use Tests\PassportTestCase;

class UsersAPITest extends PassportTestCase
{

    public function setUp(){
        parent::setUp();
    }

    /*
     * -----------------------------
     *          GET USER
     * -----------------------------
     */

    public function testGetUserNotConnected()
    {
        $response = $this->call('GET', '/api/users');
        $this->assertNotEquals(200, $response->getStatusCode());
        $this->assertNotEquals(500, $response->getStatusCode());
    }

    public function testGetUserWithConnection()
    {
        $response = $this->get('/api/users', $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($this->user->pseudo, $json->pseudo);
    }

    /*
     * -----------------------------
     *          PUT USER
     * -----------------------------
     */

    public function testPutUserNotConnected()
    {
        $user = factory(User::class)->make();
        $arrayUser = [
            'pseudo' => $user->pseudo,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
        ];

        $response = $this->call('PUT', '/api/users', $arrayUser);
        $this->assertNotEquals(200, $response->getStatusCode());
        $this->assertNotEquals(500, $response->getStatusCode());
    }

    public function testPutUserWithConnection()
    {
        $user = factory(User::class)->make();
        $arrayUser = [
            'pseudo' => $user->pseudo,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
        ];

        $response = $this->put('/api/users', $arrayUser);
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals($user->pseudo, $json->pseudo);
    }

    public function testPutUserWithFakeEmail()
    {
        $arrayUser = [
            'email' => 'gfds@gfds',
        ];

        $response = $this->put('/api/users', $arrayUser);

        $this->assertEquals(422, $response->getStatusCode());
    }

    /*
     * -----------------------------
     *          REGISTER
     * -----------------------------
     */

    public function testRegister()
    {
        $user = factory(User::class)->make();
        $arrayUser = [
            'pseudo' => $user->pseudo,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'password' => $user->password
        ];

        $response = $this->post('/api/users', $arrayUser, $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testRegisterFakeEmail()
    {
        $user = factory(User::class)->make();
        $arrayUser = [
            'pseudo' => $user->pseudo,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => 'r.r.r@',
            'password' => $user->password
        ];

        $response = $this->post('/api/users', $arrayUser, $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(422, $response->getStatusCode());
    }

    public function testRegisterWithoutEmail()
    {
        $user = factory(User::class)->make();
        $arrayUser = [
            'pseudo' => $user->pseudo,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'password' => $user->password
        ];

        $response = $this->post('/api/users', $arrayUser, $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(422, $response->getStatusCode());
    }

    public function testRegisterWithoutName()
    {
        $user = factory(User::class)->make();
        $arrayUser = [
            'pseudo' => $user->pseudo,
            'email' => $user->email,
            'first_name' => $user->first_name,
            'password' => $user->password
        ];

        $response = $this->post('/api/users', $arrayUser, $this->headers);
        $json = json_decode($response->getContent());

        $this->assertEquals(422, $response->getStatusCode());
    }
}

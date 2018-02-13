<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FrontTest extends TestCase
{
    public function testHomepage()
    {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->getStatusCode());
    }
}

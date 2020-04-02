<?php

namespace App\Tests\Controller;

use App\Tests\BaseWebTest;

class DefaultControllerTest extends BaseWebTest
{
    // redirect if no connect ( 302 )
    public function testIndexActionNoConnect()
    {
        $client = static::createClient();
        $client->request('GET', '/');
        $this->assertEquals(302, $client->getResponse()->getStatusCode()); // redirect
    }

    // valid if user/admin connect ( 200 )
    public function testIndexActionConnect()
    {
        $client = $this->login('Yohann','dev');
        $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}

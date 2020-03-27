<?php

namespace App\Tests\Controller;

use App\Tests\BaseWebTest;

class DefaultControllerTest extends BaseWebTest
{
    public function testIndexAction()
    {
        $client = $this->login('yohann','dev') ;
        $client->request('GET', '/');
        $this->assertEquals(302, $client->getResponse()->getStatusCode()); // redirect
    }
}

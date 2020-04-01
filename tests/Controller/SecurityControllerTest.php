<?php

namespace App\Tests\Controller;

use App\Tests\BaseWebTest;

class SecurityControllerTest extends BaseWebTest
{
    public function testGetLoginPage(){
        $client = $this->login('yohann','dev') ;
        $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();
    }

    public function testLogoutCheckRedirect(){
        $client = $this->login('yohann','dev') ;
        $client->request('GET', '/logout');
        $this->assertEquals(302, $client->getResponse()->getStatusCode()); // redirect
    }
}

<?php

namespace App\Tests\Controller;

use App\Tests\BaseWebTest;

class TaskControllerTestControllerTestControllerTest extends BaseWebTest
{
    public function testListAction(){
        $client = $this->login('yohann','dev') ;
        $client->request('GET', '/tasks');
        $this->assertEquals(302, $client->getResponse()->getStatusCode()); // redirect
    }
}
<?php

namespace App\Tests\Controller;

use App\Tests\BaseWebTest;

class TaskControllerTest extends BaseWebTest
{
    // if Admin or user
    public function testListAction(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    // if Admin or user
    public function testGetCreateTaskPage(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks/create');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }





}
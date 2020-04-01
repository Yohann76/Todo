<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BaseWebTest extends WebTestCase
{
    // 200
    public function testGetLoginPageSucces(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/login');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function login($username,$password) {
        return static::createClient([], [
            'PHP_AUTH_USER' => $username,
            'PHP_AUTH_PW' => $password,
        ]);
    }
}
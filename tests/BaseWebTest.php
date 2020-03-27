<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class BaseWebTest extends WebTestCase
{
    public function testGetLoginPage(){
        $client = $this->login('yohann','dev') ;
        $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();
    }

    public function login($username,$password) {
        return static::createClient([], [
            'PHP_AUTH_USER' => $username,
            'PHP_AUTH_PW' => $password
        ]);
    }
}
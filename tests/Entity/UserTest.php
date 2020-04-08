<?php

namespace App\Tests;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserTestTest extends WebTestCase
{
    private $user;

    public function setUp()
    {
        $this->user = new User();
    }

    public function testUsername()
    {
        $this->user->setUsername('Lucie');
        $this->assertEquals('Lucie', $this->user->getUsername());
    }

    public function testEmail()
    {
        $this->user->setEmail('Lucie@gmail.com');
        $this->assertEquals('Lucie@gmail.com', $this->user->getEmail());
    }

    public function testRoles()
    {
        $this->user->setRoles(["ROLE_USER"]);
        $this->assertEquals(["ROLE_USER"], $this->user->getRoles());
    }
}
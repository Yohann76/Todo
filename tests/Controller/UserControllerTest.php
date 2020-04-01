<?php

namespace App\Tests\Controller;

use App\Tests\BaseWebTest;

class UserControllerTest extends BaseWebTest
{
    // Acces /User with User roles ( 302 )
    public function testUserCreatePageWithUserRoles(){
        $client = $this->login('Fabien','dev') ;
        $client->request('GET', '/users/create');
        $this->assertEquals(403, $client->getResponse()->getStatusCode()); // Todo :  redirect task, error console
    }

    // Acces /User with Admin roles ( 200 )
    public function testUserCreatePageWithAdminRoles(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/users/create');
        $this->assertEquals(200, $client->getResponse()->getStatusCode()); // redirect
    }


    // Acces /User with User roles ( 302 )
    public function testUserPageWithUserRoles(){
        $client = $this->login('Fabien','dev') ;
        $client->request('GET', '/users');
        $this->assertEquals(403, $client->getResponse()->getStatusCode()); // Todo :  redirect task , error console 
    }

    // Acces /User with Admin roles ( 200 )
    public function testUserPageWithAdminRoles(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/users');
        $this->assertEquals(200, $client->getResponse()->getStatusCode()); // redirect
    }
}

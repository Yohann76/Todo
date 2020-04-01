<?php

namespace App\Tests\Controller;

use App\Tests\BaseWebTest;

class UserControllerTest extends BaseWebTest
{
    public function testUserListActionWithAdminRoles(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/users');
        $this->assertEquals(200, $client->getResponse()->getStatusCode()); // redirect
    }

    public function testUserCreateActionWithAdminRoles(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/users/create');
        $this->assertEquals(200, $client->getResponse()->getStatusCode()); // redirect
    }

    public function testFormCreateActionUser(){
        $client = $this->login('Yohann','dev') ;
        $crawler = $client->request('GET', '/users/create');

        $form = $crawler->selectButton('Ajouter')->form();
        $form['user[username]'] = 'UserTest';
        $form['user[password][first]'] = 'dev';
        $form['user[password][second]'] = 'dev';
        $form['user[email]'] = 'UserTest@gmail.com';
        $form['user[Roles]'] = 'ROLE_USER';

        $crawler = $client->submit($form);

        $client->followRedirect();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testUserEditActionWithAdminRoles(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/users/55/edit');
        $this->assertEquals(200, $client->getResponse()->getStatusCode()); // redirect
    }

    public function testFormEditActionUser(){
        $client = $this->login('Yohann','dev') ;
        $crawler = $client->request('GET', '/users/56/edit');

        $form = $crawler->selectButton('Modifier')->form();
        $form['user[username]'] = 'Fabien';
        $form['user[password][first]'] = 'dev';
        $form['user[password][second]'] = 'dev';
        $form['user[email]'] = 'UserTestEdit@gmail.com';
        $form['user[Roles]'] = 'ROLE_USER';

        $crawler = $client->submit($form);

        $client->followRedirect();

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}

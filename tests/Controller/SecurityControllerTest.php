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

    // if connect for acces /users
    /*
    public function testCheckPassword(){
        $client = static::createClient();

        $crawler = $client->request(
            'GET',
            '/users/create'
        );
        $form = $crawler->selectButton('submit')->form();

        $form['user[email]'] = 'toto@email.com';
        $form['user[username]'] = 'usernametest';
        $form['user[Roles]'] = ['ROLE_ADMIN'];
        $form['user[password][first]'] = 'pass1';
        $form['user[password][second]'] = 'pass2';

        $crawler = $client->submit($form);

        $this->assertEquals(1,
            $crawler->filter('li:contains("This value is not valid.")')->count()
        );
    }
    */
}

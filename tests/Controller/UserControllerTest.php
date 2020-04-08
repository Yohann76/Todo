<?php

namespace App\Tests\Controller;

use App\Entity\User;
use App\Tests\BaseWebTest;

class UserControllerTest extends BaseWebTest
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
        self::ensureKernelShutdown();
    }

    private function searchUser()
    {
        $result = $this->entityManager
            ->getRepository(User::class)
            ->findOneBy(array('username' => 'Fabien'));
        $this->entityManager->close();
        return $result;
    }

    public function testUserEditActionWithAdminRoles()
    {
        $client = $this->login('Yohann','dev') ;
        $crawler = $client->request('GET', '/users/'.$this->searchUser()->getId().'/edit');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testUserListActionWithAdminRoles()
    {
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/users');
        $this->assertEquals(200, $client->getResponse()->getStatusCode()); // redirect
    }

    public function testUserCreateActionWithAdminRoles()
    {
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/users/create');
        $this->assertEquals(200, $client->getResponse()->getStatusCode()); // redirect
    }

    public function testFormCreateActionUser()
    {
        $client = $this->login('Yohann','dev') ;
        $crawler = $client->request('GET', '/users/create');

        $form = $crawler->selectButton('Ajouter')->form();
        $form['user[username]'] = 'UserTest'.rand(100,100000000);
        $form['user[password][first]'] = 'dev';
        $form['user[password][second]'] = 'dev';
        $form['user[email]'] = 'hello'.rand(100,100000000).'@gmail.com';
        $form['user[Roles]'] = 'ROLE_USER';

        $crawler = $client->submit($form);
        //$this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertFalse($client->getResponse()->isSuccessful());
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testFormEditActionUser()
    {
        $client = $this->login('Yohann','dev') ;
        $crawler = $client->request('GET', '/users/'.$this->searchUser()->getId().'/edit');

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

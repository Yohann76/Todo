<?php

namespace App\Tests\Controller;

use App\Entity\Task;
use App\Tests\BaseWebTest;

class TaskControllerTest extends BaseWebTest
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

    private function searchTasks()
    {
        $result = $this->entityManager
            ->getRepository(Task::class)
            ->findOneBy(array('isDone' => 0));
        $this->entityManager->close();
        return $result;
    }

    public function testEditActionTaskPage()
    {
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks/'.$this->searchTasks()->getId().'/edit');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testToggleTaskActionTaskPage()
    {
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks/'.$this->searchTasks()->getId().'/toggle');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    public function testFormCreateActionTask()
    {
        $client = $this->login('Yohann','dev') ;
        $crawler = $client->request('GET', '/tasks/create');

        $form = $crawler->selectButton('Ajouter')->form();
        $form['task[title]'] = 'Task';
        $form['task[content]'] = 'Symfony rocks!';
        $crawler = $client->submit($form);

        $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testFormEditActionTask()
    {
        $client = $this->login('Yohann','dev') ;
        $crawler = $client->request('GET', '/tasks/'.$this->searchTasks()->getId().'/edit');

        $form = $crawler->selectButton('Modifier')->form();
        $form['task[title]'] = 'TaskEdit';
        $form['task[content]'] = 'Symfony rocks!Edit';
        $crawler = $client->submit($form);

        $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testListActionPage()
    {
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCreateActionTaskPage()
    {
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks/create');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testFinishedTaskPage()
    {
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks/finished');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
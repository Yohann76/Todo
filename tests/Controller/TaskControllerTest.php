<?php

namespace App\Tests\Controller;

use App\Entity\Task;
use App\Form\TaskType;
use App\Tests\BaseWebTest;
use Symfony\Component\Form\Test\TypeTestCase;

class TaskControllerTest extends BaseWebTest
{
    public function testListAction(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCreateActionTaskPage(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks/create');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testFormCreateActionTask(){
        $client = $this->login('Yohann','dev') ;
        $crawler = $client->request('GET', '/tasks/create');

        $form = $crawler->selectButton('Ajouter')->form();
        $form['task[title]'] = 'Task';
        $form['task[content]'] = 'Symfony rocks!';
        $crawler = $client->submit($form);

        $client->followRedirect();
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testEditActionTaskPage(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks/86/edit');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testToggleTaskActionTaskPage(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks/86/toggle');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    // Todo Get delete task

    // if Admin or user
    public function testFinishedTaskPage(){
        $client = $this->login('Yohann','dev') ;
        $client->request('GET', '/tasks/finished');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
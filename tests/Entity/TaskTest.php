<?php

namespace App\Tests;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class phoneTest extends WebTestCase
{
    private $task;

    public function setUp()
    {
        $this->task = new Task();
    }

    public function testTitle()
    {
        $this->task->setTitle('Fixtures');
        $this->assertEquals('Fixtures', $this->task->getTitle());
    }

    public function testContent()
    {
        $this->task->setContent('Fixtures content');
        $this->assertEquals('Fixtures content', $this->task->getContent());
    }
}
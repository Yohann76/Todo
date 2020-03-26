<?php

namespace App\DataFixtures;

use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TaskFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $task = new Task();
        $task->setTitle('Add Datafixtures');
        $task->setContent('dev');
        $manager->persist($task);

        $task1 = new Task();
        $task1->setTitle('Add functions');
        $task1->setContent('dev');
        $manager->persist($task1);

        $task2 = new Task();
        $task2->setTitle('Add user');
        $task2->setContent('dev');
        $manager->persist($task2);

        $manager->flush();

    }
}

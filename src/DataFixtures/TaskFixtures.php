<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TaskFixtures extends Fixture implements DependentFixtureInterface
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

        // Task with User
        $task3 = new Task();
        $task3->setTitle('Add Datafixtures');
        $task3->setContent('dev');
        $task3->setAuthor($this->getReference('YOHANN'));
        $manager->persist($task3);

        $task4 = new Task();
        $task4->setTitle('Add functions');
        $task4->setContent('dev');
        $task4->setAuthor($this->getReference('KEVIN'));

        $manager->persist($task4);

        $task5 = new Task();
        $task5->setTitle('Add user');
        $task5->setContent('dev');
        $task5->setAuthor($this->getReference('FABIEN'));
        $manager->persist($task5);

        $manager->flush();
    }

    // DependentFixtureInterface :  Load UserFixtures before TaskFixtures
    public function getDependencies()
    {
        return array(
            UserFixtures::class
        );
    }
}

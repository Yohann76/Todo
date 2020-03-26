<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        // Create User
        $user = new User();
        $user->setUsername('Yohann');
        $user->setEmail('yohanndurand76@gmail.com');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'dev'));
        $manager->persist($user);

        $user1 = new User();
        $user1->setUsername('Yohann1');
        $user1->setEmail('yohanndurand1@gmail.com');
        $user1->setPassword($this->passwordEncoder->encodePassword($user1,'dev'));
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('Yohann2');
        $user2->setEmail('yohanndurand2@gmail.com');
        $user2->setPassword($this->passwordEncoder->encodePassword($user2,'dev'));
        $manager->persist($user2);

        $manager->flush();

    }

}

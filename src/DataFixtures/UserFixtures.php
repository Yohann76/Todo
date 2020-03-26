<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    public const YOHANN = 'YOHANN';
    public const KEVIN = 'KEVIN';
    public const FABIEN = 'FABIEN';

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        // Create User
        $yohann = new User();
        $yohann->setUsername('Yohann');
        $yohann->setEmail('yohanndurand76@gmail.com');
        $yohann->setPassword($this->passwordEncoder->encodePassword($yohann,'dev'));
        $this->addReference('YOHANN',$yohann);
        $manager->persist($yohann);

        $kevin = new User();
        $kevin->setUsername('Kevin');
        $kevin->setEmail('kevin@gmail.com');
        $kevin->setPassword($this->passwordEncoder->encodePassword($kevin,'dev'));
        $this->addReference('KEVIN',$kevin);
        $manager->persist($kevin);

        $fabien = new User();
        $fabien->setUsername('Fabien');
        $fabien->setEmail('fabien@gmail.com');
        $fabien->setPassword($this->passwordEncoder->encodePassword($fabien,'dev'));
        $this->addReference('FABIEN',$fabien);
        $manager->persist($fabien);

        $manager->flush();

    }
}

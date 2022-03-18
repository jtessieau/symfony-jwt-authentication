<?php

namespace App\Fixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->hasher = $passwordHasher;
    }
    public function load(ObjectManager $manager)
    {

        $users = ['admin', 'user', 'test'];

        foreach ($users as $user) {

            $userEntity = new User();

            $hashedPassword = $this->hasher->hashPassword($userEntity, 'test');
            $email = $user . "@test.com";

            $userEntity->setEmail($email)
                ->setPassword($hashedPassword);

            $manager->persist($userEntity);
        }
        $manager->flush();
    }
}

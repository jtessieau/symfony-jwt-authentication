<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    #[Route(path: '/register-test-user', name: 'register_test_user')]
    public function registerTestUser(UserPasswordHasherInterface $hasher, EntityManagerInterface $manager): Response
    {
        $user = new User();

        $email = 'controllersRegistration@test.com';
        $hashedPassword = $hasher->hashPassword($user, 'test');

        $user->setEmail($email)
            ->setPassword($hashedPassword);

        $manager->persist($user);
        $manager->flush();

        return new Response('User added.');
    }
}

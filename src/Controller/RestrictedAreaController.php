<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RestrictedAreaController extends AbstractController
{
    #[Route(path: '/restricted', name: 'restricted_area')]
    public function index(): Response
    {
        return new Response('Welcome to the restricted area ' . $this->getUser()->getUserIdentifier());
    }
}

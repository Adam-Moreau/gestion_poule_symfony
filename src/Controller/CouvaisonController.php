<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CouvaisonController extends AbstractController
{
    #[Route('/couvaison', name: 'app_couvaison')]
    public function index(): Response
    {
        return $this->render('couvaison/index.html.twig', [
            'controller_name' => 'CouvaisonController',
        ]);
    }
}

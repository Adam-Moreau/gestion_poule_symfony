<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PouleRepository;
use App\Entity\Poule;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;
use App\Form\PouleFormType;

class PouleController extends AbstractController
{
    #[Route('/poule', name: 'app_poule')]
    public function index(): Response
    {
        return $this->render('poule/index.html.twig', [
            'controller_name' => 'PouleController',
        ]);
    }

    #[Route('/poule/{id}', name: 'poule')]
        public function show(Environment $twig, Poule $poule): Response
        {
            $form = $this->createForm(PouleFormType::class, $poule);

            return new Response($twig->render('poule/pouleDescription.html.twig', [
                'poule' => $poule,
                'poule_form' => $form->createView(),
                
            ]));
    }
        
}

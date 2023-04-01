<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PouleRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Poule;
use Twig\Environment;
use App\Form\PouleCreaFormType;

class CreaPouleController extends AbstractController
{
    #[Route('/crea/poule', name: 'app_crea_poule')]
    public function index(
        Environment $twig,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $poule = new Poule();
        $form = $this->createForm(PouleCreaFormType::class, $poule);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            if ($form->get('image')->getData()) {
                $image = $form->get('image')->getData();

                $fichier = md5(uniqid()) . '.' . $image->guessExtension();

                $image->move(
                    $this->getParameter('image_directory_path'),
                    $fichier
                );

                $message->setImage($fichier);
            }
            $poule = $form->getData();

            $entityManager->persist($poule);
            $entityManager->flush();
            // ... perform some action, such as saving the task to the database
            return new Response('oui');

            //    return $this->redirectToRoute('task_success');
        }

        return new Response(
            $twig->render('crea_poule/crea_poule.html.twig', [
                'poule' => $poule,
                'crea_poule_form' => $form->createView(),
            ])
        );
    }
}

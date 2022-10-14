<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Poule;
use Twig\Environment;
use App\Repository\PouleRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(Request $request, Environment $twig, PouleRepository $pouleRepository): Response
    {
        $offset = max(0, $request->query->getInt('offset', 0));
        $paginator = $pouleRepository->getPoulePaginator($offset);
        return new Response($twig->render('index/index.html.twig', [  
            'poules' => $paginator,
            'previous' => $offset - PouleRepository::PAGINATOR_PER_PAGE,
            'next' => min(count($paginator), $offset + PouleRepository::PAGINATOR_PER_PAGE),
            'count' => count($paginator),
            'paginator' => PouleRepository::PAGINATOR_PER_PAGE,
        ]));
    }
}

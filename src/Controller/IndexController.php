<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Poule;
use Twig\Environment;
use App\Repository\PouleRepository;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(Request $request, Environment $twig, PouleRepository $pouleRepository): Response
    {
        $poules = $pouleRepository->findAll();
        
        return new Response($twig->render('index/index.html.twig', [
            'poules' => $poules
        ]));
    }
}

// namespace App\Controller;

// use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\Routing\Annotation\Route;
// use App\Entity\Poule;
// use Twig\Environment;
// use App\Repository\PouleRepository;
// use Doctrine\ORM\Tools\Pagination\Paginator;

// class IndexController extends AbstractController
// {
//     #[Route('/index', name: 'app_index')]
//     public function index(Request $request, Environment $twig, PouleRepository $pouleRepository): Response
//     {
//         $offset = max(0, $request->query->getInt('offset', 0));
//         $paginator = $pouleRepository->getPoulePaginator($offset);
//         $paginatorCount = count($paginator);
//         $previous = $offset - PouleRepository::PAGINATOR_PER_PAGE;
//         $next = min($paginatorCount, $offset + PouleRepository::PAGINATOR_PER_PAGE);
//         if ($paginatorCount < 4) {
//             $previous = 0;
//             $next = 0;
//         }

//     return new Response($twig->render('index/index.html.twig', [
//         'poules' => $paginator,
//         'previous' => $previous,
//         'next' => $next,
//         'count' => $paginatorCount,
//         'paginator' => PouleRepository::PAGINATOR_PER_PAGE,
//     ]));

//     }
// }

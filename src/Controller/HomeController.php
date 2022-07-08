<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TicketRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(TicketRepository $ticketRepository, CategoryRepository $categoryRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Accueil',
            'tickets' => $ticketRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}

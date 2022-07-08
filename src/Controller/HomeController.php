<?php

namespace App\Controller;

use App\Entity\Category;
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

    #[Route('/{id}', name: 'app_category')]
    public function findAllByCategory(TicketRepository $ticketRepository, CategoryRepository $categoryRepository, Category $category): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'Accueil',
            'tickets' => $ticketRepository->findBy(array('category' => $category)),
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}

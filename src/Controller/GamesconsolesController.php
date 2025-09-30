<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class GamesconsolesController extends AbstractController
{
    #[Route('/gamesconsoles', name: 'app_gamesconsoles')]
    public function index(): Response
    {
        return $this->render('gamesconsoles/index.html.twig', [
            'controller_name' => 'GamesconsolesController',
        ]);
    }
}

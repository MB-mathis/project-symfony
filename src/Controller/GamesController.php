<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Games;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\GamesInsertType;





final class GamesController extends AbstractController
{
    #[Route('/games', name: 'app_games')]
         public function new(Request $request,EntityManagerInterface $entityManager): Response
        
    {
        
        $game = new Games();
        $formG = $this->createForm(GamesInsertType::class, $game);
        $formG->handleRequest($request);

        if ($formG->isSubmitted() && $formG->isValid()) {
            $game = $formG->getData();
            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($game);
            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();
        }
        return $this->render('games/index.html.twig', [
            'formG' => $formG->createView(),
        ]);
        
    }

}
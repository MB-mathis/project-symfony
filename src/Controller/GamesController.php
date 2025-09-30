<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Games;
use Doctrine\ORM\EntityManagerInterface;



final class GamesController extends AbstractController
{
    #[Route('/games', name: 'app_games')]
        public function createGame(EntityManagerInterface $entityManager): Response
    {
        $game = new Games();
        $game->setName('kirby');
        $game->setPegi(7);


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($game);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$game->getId());
    }
}


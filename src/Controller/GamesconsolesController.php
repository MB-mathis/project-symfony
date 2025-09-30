<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Gamesconsoles;
use Doctrine\ORM\EntityManagerInterface;
final class GamesconsolesController extends AbstractController
{
    #[Route('/gamesconsoles', name: 'app_gamesconsoles')]
           public function createGameConsole(EntityManagerInterface $entityManager): Response
    {
        $console = new Gamesconsoles();
        $console->setName('nintendo 64');


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($console);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$console->getId());
    }
}

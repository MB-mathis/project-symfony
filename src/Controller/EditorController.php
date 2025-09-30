<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Gamesconsoles;
use Doctrine\ORM\EntityManagerInterface;

final class EditorController extends AbstractController
{
    #[Route('/editor', name: 'app_editor')]
    public function createEditor(EntityManagerInterface $entityManager): Response
    {
        $editor = new Gamesconsoles();
        $editor->setName('nintendo 64');
        $editor->setCA(700000000000);


        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($editor);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$editor->getId());
    }
}
